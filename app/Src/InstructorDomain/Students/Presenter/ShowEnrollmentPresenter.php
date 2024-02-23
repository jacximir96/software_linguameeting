<?php

namespace App\Src\InstructorDomain\Students\Presenter;

use App\Src\CourseDomain\Course\Repository\CourseInstructorRepository;
use App\Src\CourseDomain\SessionDomain\StudentReview\Repository\StudentReviewRepository;
use App\Src\CourseDomain\SessionDomain\StudentReview\Service\Grade;
use App\Src\CourseDomain\SessionDomain\StudentReviewType\Model\NumericGrade;
use App\Src\CourseDomain\SessionDomain\StudentReviewType\Service\RubricBuilder;
use App\Src\Shared\Model\ValueObject\Id;
use App\Src\Shared\Service\IdCollection;
use App\Src\StudentDomain\Enrollment\Model\Enrollment;
use App\Src\UserDomain\User\Model\User;
use Illuminate\Support\Collection;


class ShowEnrollmentPresenter
{
    //construct
    private CourseInstructorRepository $courseInstructorRepository;

    private StudentReviewRepository $studentReviewRepository;

    private RubricBuilder $rubricBuilder;

    //status
    private User $instructor;

    private Collection $instructorCourses;


    private GradeStats $gradeStats;

    public function __construct(CourseInstructorRepository $courseInstructorRepository, StudentReviewRepository $studentReviewRepository, RubricBuilder $rubricBuilder)
    {
        $this->courseInstructorRepository = $courseInstructorRepository;
        $this->studentReviewRepository = $studentReviewRepository;
        $this->rubricBuilder = $rubricBuilder;

        $this->instructorCourses = collect();
        //$this->students = new Students();
        //$this->gradeStats = new GradeStats();

    }

    public function handle(Enrollment $enrollment): ShowEnrollmentResponse
    {

        $enrollmentSessions = $enrollment->enrollmentSession->sortBy(function ($enrollmentSession){
            return $enrollmentSession->scheduleSession()->start()->toDatetimeString();
        });

        $rubric = $this->rubricBuilder->buildForInstructor();

        return new ShowEnrollmentResponse($enrollment, $enrollmentSessions, $rubric);
    }


    private function configStudentData()
    {

        $collectionCoursesId = $this->obtainIdCollectionFromCourse($this->instructorCourses);

        $reviews = $this->studentReviewRepository->obtainByCourses($collectionCoursesId);

        foreach ($reviews as $review) {
            if ($review->hasGrade()) {
                $this->gradeStats->addGrade($review->grade());
                $this->students->addReview($review);
            }
        }

        /**********************************/
        //todo eliminar este bucle que genera datos de prueba para el gráfico del gradeboook
        for ($i = 1; $i <= 500; $i++) {
            $randOne = new NumericGrade(rand(1, 4));
            $randTwo = new NumericGrade(rand(1, 3));
            $randThree = new NumericGrade(rand(1, 3));

            $grade = new Grade($randOne, $randTwo, $randThree);

            $this->gradeStats->addGrade($grade);
        }
    }

    private function obtainIdCollectionFromCourse(Collection $courses): IdCollection
    {

        $idCollection = new IdCollection();
        foreach ($courses as $course) {
            $id = new Id($course->id);
            $idCollection->add($id);
        }

        return $idCollection;
    }
}
