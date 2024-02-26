<?php
namespace App\Http\Controllers\Instructor\Course\Coaches;

use App\Http\Controllers\Admin\Breadcrumable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Src\InstructorDomain\Coaches\Presenter\Breadcrumb\Instructor\IndexBreadcrumb;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    use Breadcrumable;

    public function __construct (){

    }


    public function __invoke(Request $request)
    {
        $userId = auth()->id();

        if($request->has('course')){
            if($request->course === 'all'){
                $coaches = DB::table('user')
                ->join('coach_coordinator', 'user.id', '=', 'coach_coordinator.coach_id')
                ->join('country','user.country_id','=','country.id')
                ->join('coach_info', 'user.id', '=', 'coach_info.user_id')
                ->select('user.id', 'user.name', 'user.lastname', 'user.url_photo', 'country.name as countryName', 'country.iso2 as flag', 'coach_info.url_video as video', 'coach_info.description as description')
                ->where('coach_coordinator.coordinator_id', $userId)
                ->get();
            }
            else{
                $coaches = DB::table('user')
                ->join('coach_coordinator', 'user.id', '=', 'coach_coordinator.coach_id')
                ->join('country','user.country_id','=','country.id')
                ->join('coach_info', 'user.id', '=', 'coach_info.user_id')
                ->join('course_coach', 'user.id', '=', 'course_coach.coach_id')
                ->select('user.id', 'user.name', 'user.lastname', 'user.url_photo', 'country.name as countryName', 'country.iso2 as flag', 'coach_info.url_video as video', 'coach_info.description as description', 'course_coach.course_id')
                ->where('coach_coordinator.coordinator_id', $userId)
                ->where('course_coach.course_id', $request->course)
                ->get();
            }
            
        }
        else{
            $coaches = DB::table('user')
            ->join('coach_coordinator', 'user.id', '=', 'coach_coordinator.coach_id')
            ->join('country','user.country_id','=','country.id')
            ->join('coach_info', 'user.id', '=', 'coach_info.user_id')
            ->select('user.id', 'user.name', 'user.lastname', 'user.url_photo', 'country.name as countryName', 'country.iso2 as flag', 'coach_info.url_video as video', 'coach_info.description as description')
            ->where('coach_coordinator.coordinator_id', $userId)
            ->get(); 
        }
        
        $courses = DB::table('user')
        ->join('coach_coordinator', 'user.id', '=', 'coach_coordinator.coach_id')
        ->join('course_coach', 'user.id', '=', 'course_coach.coach_id')
        ->join('course', 'course_coach.course_id', '=', 'course.id')
        ->select('course_coach.course_id', 'course.name')
        ->distinct()
        ->where('coach_coordinator.coordinator_id', $userId)
        ->where('course.end_date', '>=', now())
        ->get();
        

        $breadcrumb = new IndexBreadcrumb();
        $this->buildBreadcrumbInstanceAndSendToView($breadcrumb);


        return view('instructor.course.coaches.index', compact('coaches', 'courses'));
    }
}
