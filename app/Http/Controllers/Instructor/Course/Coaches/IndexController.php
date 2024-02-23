<?php
namespace App\Http\Controllers\Instructor\Course\Coaches;

use App\Http\Controllers\Admin\Breadcrumable;
use App\Http\Controllers\Controller;
use App\Src\InstructorDomain\Coaches\Presenter\Breadcrumb\Instructor\IndexBreadcrumb;



class IndexController extends Controller
{
    use Breadcrumable;

    public function __construct (){

    }


    public function __invoke()
    {

        $breadcrumb = new IndexBreadcrumb();
        $this->buildBreadcrumbInstanceAndSendToView($breadcrumb);


        return view('instructor.course.coaches.index');
    }
}
