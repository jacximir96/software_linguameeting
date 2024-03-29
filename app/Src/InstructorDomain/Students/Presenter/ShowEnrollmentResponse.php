<?php
namespace App\Src\InstructorDomain\Students\Presenter;

use App\Src\CourseDomain\Course\Model\SessionNumber;
use App\Src\CourseDomain\SessionDomain\StudentReviewType\Service\InstructorRubric;
use App\Src\StudentDomain\Enrollment\Model\Enrollment;
use Illuminate\Support\Collection;


class ShowEnrollmentResponse
{

    private Enrollment $enrollment;

    private Collection $enrollmentSessions;

    private InstructorRubric $rubric;

    public function __construct(Enrollment $enrollment, Collection $enrollmentSessions, InstructorRubric $rubric){
        $this->enrollment = $enrollment;
        $this->enrollmentSessions = $enrollmentSessions;
        $this->rubric = $rubric;
    }

    public function enrollmentSessions ():Collection{
        return $this->enrollmentSessions;
    }

    public function rubric(): InstructorRubric
    {
        return $this->rubric;
    }

    public function numCourseSessions ():SessionNumber{
        return $this->enrollment->course()->conversationPackage->obtainSessionSetup()->sessionNumber();
    }


    public function countSessionsCompleted ():int{

        $numSessionsCompleted = 0;

        foreach ($this->enrollmentSessions as $enrollmentSession){

            if ($enrollmentSession->status->isAttended()){
                $numSessionsCompleted++;
            }
        }

        return $numSessionsCompleted;
    }
}
