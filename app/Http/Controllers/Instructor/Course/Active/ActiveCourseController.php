<?php

namespace App\Http\Controllers\Instructor\Course\Active;

use App\Http\Controllers\Admin\Breadcrumable;
use App\Http\Controllers\Controller;
use App\Src\InstructorDomain\InstructorCourse\Presenter\Breadcrumb\Instructor\IndexBreadcrumb;
use App\Src\UserDomain\Role\Service\RoleChecker;
use App\Http\Controllers\Admin\Instructor\Presentable;
use App\Http\Models\SemesterModel;
use App\Http\Models\CourseModel;
use App\Http\Models\UniversityModel;
use App\Http\Models\TimezoneModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ActiveCourseController extends Controller
{
    use Breadcrumable;

    public function closeCourse(Request $request, $id) {

        $course_id = intval($request->idSection);
        // $course_id = intval($id);
        $close = true;
        $send = "";

        try {

            $course = CourseModel::select('id','university_id','is_flex','closed_date')->where('id','=',$course_id)->first();
        
            // Buscar zona horaria de la universidad y ver que no hay estudiantes con sesiones futuras o pasadas. 
            // Comparar con zona horaria estudiante.
            $university = UniversityModel::select('university.id','timezone.name')
                        ->leftJoin('timezone','university.timezone_id','=','timezone.id')
                        ->where('university.id','=',$course->university_id)
                        ->get();

            $today_uni = Carbon::now()->setTimezone($university[0]->name);


            $today_uni->modify("-1 day");
            $dayBefore = $today_uni->format('Y-m-d');
            
            /* MEJORAR LUEGO */
            $affectedRows = CourseModel::where("id", $course_id)->update(["closed_date" => $dayBefore]);

            if ($affectedRows === 0 || $course === null) {
                throw new \Exception("Error updating course data.");
            }

            return redirect()->back()->with('success', 'Course closed successfully.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
}