<?php
namespace App\Http\Controllers\Instructor\Course\Schedule;

use App\Http\Controllers\Admin\Breadcrumable;
use App\Http\Controllers\Controller;
use App\Src\InstructorDomain\Schedule\Presenter\Breadcrumb\Instructor\IndexBreadcrumb;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class IndexController extends Controller
{
    use Breadcrumable;

    public function __construct (){

    }


    public function __invoke(Request $request)
{
    $instructor = user()->id;
    $instructor = 123357;
    // $instructor = 123353;

    $courses = DB::table('section')
        ->join('session', 'section.course_id', '=', 'session.course_id')
        ->select('session.day', 'session.start_time', 'session.end_time')
        ->where('instructor_id', $instructor)
        ->distinct()
        ->get();

        $startOfWeek = Session::get('startOfWeek', now()->locale('es')->startOfWeek());

        $direction = $request->input('direction');
    
        if ($direction === 'next') {
            $startOfWeek->addWeek();
        } elseif ($direction === 'back') {
            $startOfWeek->subWeek();
        }
        
        Session::put('startOfWeek', $startOfWeek);

    $days = [];
    foreach ($courses as $course) {
        $days[] = [
            'day' => $course->day,
            'start_time' => $course->start_time,
            'end_time' => $course->end_time,
        ];
    }

    $sections = DB::table('section')
        ->select('section.id', 'section.name')
        ->where('section.instructor_id', $instructor)
        ->get();
    
    $breadcrumb = new IndexBreadcrumb();
    $this->buildBreadcrumbInstanceAndSendToView($breadcrumb);   
    return view('instructor.course.schedule.index', compact('days', 'sections', 'startOfWeek'));
}

}
