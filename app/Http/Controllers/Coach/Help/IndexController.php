<?php
namespace App\Http\Controllers\Coach\Help;

use App\Http\Controllers\Admin\Breadcrumable;
use App\Http\Controllers\Controller;
use App\Src\CoachDomain\CoachHelp\Repository\CoachHelpRepository;
use App\Src\CoachDomain\CoachHelp\Presenter\Breadcrumb\Coach\IndexBreadcrumb;



class IndexController extends Controller
{
    use Breadcrumable;

    private CoachHelpRepository $coachHelpRepository;

    public function __construct (CoachHelpRepository $coachHelpRepository){

        $this->coachHelpRepository = $coachHelpRepository;
    }


    public function __invoke()
    {

        $helps = $this->coachHelpRepository->all();

        $breadcrumb = new IndexBreadcrumb();
        $this->buildBreadcrumbInstanceAndSendToView($breadcrumb);

        view()->share([
            'helps' => $helps,
        ]);

        return view('coach.help.index');
    }
}
