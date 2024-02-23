<?php
namespace App\Http\Controllers\Instructor\Course;

use App\Http\Controllers\Admin\Breadcrumable;
use App\Http\Controllers\Controller;
use App\Src\InstructorDomain\InstructorCourse\Presenter\Breadcrumb\Instructor\IndexBreadcrumb;
use App\Src\UserDomain\Role\Service\RoleChecker;
use App\Http\Controllers\Admin\Instructor\Presentable;


class IndexController extends Controller
{
    use Breadcrumable, Presentable;

    private RoleChecker $checkerRole;

    public function __construct (RoleChecker $checkerRole){

        $this->checkerRole = $checkerRole;
        
    }


    public function __invoke()
    {
        $instructor = user();

        //dd('listado');
        $presenter = $this->obtainPresenter($this->checkerRole, $instructor->rol());
        $data = $presenter->handle($instructor);
        
        $breadcrumb = new IndexBreadcrumb();
        $this->buildBreadcrumbInstanceAndSendToView($breadcrumb);

        view()->share([
            'checkerRole' => $this->checkerRole,
            'data' => $data,
        ]);
        
        return view('instructor.course.index');
    }
}
