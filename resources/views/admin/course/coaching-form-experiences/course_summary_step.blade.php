@extends('layouts.app')

@section('content')


    <div class="card">

        @include('admin.course.coaching-form.header_card')

        <div class="card-body container">

            @include('admin.course.coaching-form-experiences.wizard_step', ['step' => 3])

            @include('common.form_message_errors')

            <div class="row mt-2 mt-sm-4">

                <div class="col-12 mb-2 py-2 pegajoso ">

                    <div class="card rounded shadow bg-white" style="border-color: #35b4b4;">
                        <div class="row">
                            <div class="col-12 col-md-9 col-xl-10 py-1">
                                <span class="p-1 ms-2 d-block  fw-bold">
                                    Please review your course before submitting. You will receive email confirmation upon completion.
                                </span>

                            </div>
                            <div class="col-12 col-md-3 col-xl-2 mb-1 mt-md-3 mt-xl-1">
                                <a href="{{route('get.admin.course.coaching_form.confirmation', $course)}}"
                                   title="Finish the configuration and send an email with the course summary."
                                   class="btn btn-bold btn-sm float-end  px-4 me-2 bg-text-corporate-color text-white fw-bold">
                                    Submit <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    @include('admin.course.coaching-form-experiences.course-summary.info_general')
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 d-xl-none">
                            <div class="card p-3">
                                @include('admin.course.coaching-form-experiences.course-summary.sections', ['sections' => $course->section])
                            </div>
                        </div>
                        <div class="col-12 d-none d-xl-block">
                            <div class="card p-3 d-none d-xl-block">
                                @include('admin.course.coaching-form-experiences.course-summary.sections_table', ['sections' => $course->section])
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
