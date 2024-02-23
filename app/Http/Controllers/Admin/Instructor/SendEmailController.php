<?php

namespace App\Http\Controllers\Admin\Instructor;

use App\Http\Controllers\Admin\Orderable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\User\MailableController;
use App\Src\InstructorDomain\Instructor\Repository\InstructorRepository;
use App\Src\InstructorDomain\Instructor\Service\SendMailForm;
use App\Src\UserDomain\User\Action\SendSimpleEmailAction;
use App\Src\UserDomain\User\Request\SendEmailRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SendEmailController extends Controller
{
    use Orderable, MailableController;

    private InstructorRepository $instructorRepository;

    public function __construct(InstructorRepository $instructorRepository)
    {
        $this->instructorRepository = $instructorRepository;
    }

    public function configView()
    {
        $this->configParameters();

        $sendEmailForm = app(SendMailForm::class);
        $sendEmailForm->config();

        view()->share([
            'form' => $sendEmailForm,
        ]);

        return view('user.email.simple_email_form');
    }

    public function send(SendEmailRequest $request)
    {
        try {

            DB::beginTransaction();

            $usersIdsCollection = $this->obtainIdsCollection($request, $this->instructorRepository);

            if (is_null($usersIdsCollection)) {

                flash('User ids are required')->error();

                return view('common.feedback_modal');
            }

            $action = app(SendSimpleEmailAction::class);
            $action->handle($usersIdsCollection, $request->buildEmail());

            DB::commit();

            flash('Email sent successfully')->success();

            return view('common.feedback_modal');

        } catch (\Throwable $exception) {

            Log::error('There is an error when sending simple email', [
                'request' => $request,
                'exception' => $exception,
            ]);

            flash(trans('user.send_mail.error.to_send'))->error();

            return back()->withInput();
        }
    }
}
