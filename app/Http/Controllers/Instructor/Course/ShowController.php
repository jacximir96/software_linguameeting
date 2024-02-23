<?php
namespace App\Http\Controllers\Instructor\Course;

use App\Http\Controllers\Admin\Breadcrumable;
use App\Http\Controllers\Controller;
use App\Src\InstructorDomain\InstructorCourse\Presenter\Breadcrumb\Instructor\IndexBreadcrumb;
use App\Src\CourseDomain\Course\Model\Course;
use App\Src\CourseDomain\Course\Repository\CourseRepository;
use App\Src\PaymentDomain\Money\Service\LinguaMoney;
use App\Http\Controllers\Admin\Course\CoachingForm\Wizard\Summarizable;
use Illuminate\Support\Facades\Log;
use App\Src\InstructorDomain\Canvas\Repository\CanvasRepository;

class ShowController extends Controller
{
    use Breadcrumable, Summarizable;
    
    private CourseRepository $courseRepository;
    private CanvasRepository $canvasRepository;

    public function __construct (CourseRepository $courseRepository, CanvasRepository $canvasRepository){

        $this->courseRepository = $courseRepository;
        $this->canvasRepository = $canvasRepository;
    }


    public function __invoke(Course $course)
    {

        try {

            $instructor = user();

            $breadcrumb = new IndexBreadcrumb();
            $this->buildBreadcrumbInstanceAndSendToView($breadcrumb);

            $course->load($this->courseRepository->relationsWithSections());
            $canvas = $this->canvasRepository->canvasInstructor($course, $instructor);
            
            $canvas_id = "";
            if(!empty($canvas)){
                $canvas_id = $canvas->canvas_course_id;
            }
            
            $this->buildCourseSummaryFromCourse($course);

            view()->share([
                'course' => $course,
                'linguaMoney' => new LinguaMoney(),
                'loadExpanderJs' => true,
                'canvas_id' => $canvas_id,
            ]);

            return view('instructor.course.show');
            
        } catch (\Throwable $exception) {
            Log::error('There is an error when show course', [
                'course' => $course,
                'exception' => $exception,
            ]);

            flash(trans('coaching_form.exception.error_general'))->error();

            return back();
        }

        
    }
}
