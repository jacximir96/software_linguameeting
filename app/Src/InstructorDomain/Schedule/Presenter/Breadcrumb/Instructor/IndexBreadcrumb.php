<?php

namespace App\Src\InstructorDomain\Schedule\Presenter\Breadcrumb\Instructor;

use App\Src\Shared\Presenter\Breadcrumb\Breadcrumb;
use App\Src\Shared\Presenter\Breadcrumb\IBreadcrumb;
use App\Src\Shared\Presenter\Breadcrumb\ItemTag;

class IndexBreadcrumb implements IBreadcrumb
{
    public function handle(): Breadcrumb
    {
        $breadcrumb = Breadcrumb::buildWithDashboard();

        $tag = new ItemTag('Schedule');
        $breadcrumb->push($tag);

        return $breadcrumb;
    }
}
