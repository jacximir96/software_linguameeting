@extends('layouts.app')

@section('content')

    <div class="container px-4">

        <div class="row margin-top-20">

            <div class="col-md-12">

                <div class="card chart-card-background">

                    <div class="card-body float-none">

                        <div class="">
                            <div class="title-dashboard-circle float-start">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.8em" fill="white" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M32 0C49.7 0 64 14.3 64 32V48l69-17.2c38.1-9.5 78.3-5.1 113.5 12.5c46.3 23.2 100.8 23.2 147.1 0l9.6-4.8C423.8 28.1 448 43.1 448 66.1V345.8c0 13.3-8.3 25.3-20.8 30l-34.7 13c-46.2 17.3-97.6 14.6-141.7-7.4c-37.9-19-81.3-23.7-122.5-13.4L64 384v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V400 334 64 32C0 14.3 14.3 0 32 0zM64 187.1l64-13.9v65.5L64 252.6V318l48.8-12.2c5.1-1.3 10.1-2.4 15.2-3.3V238.7l38.9-8.4c8.3-1.8 16.7-2.5 25.1-2.1l0-64c13.6 .4 27.2 2.6 40.4 6.4l23.6 6.9v66.7l-41.7-12.3c-7.3-2.1-14.8-3.4-22.3-3.8v71.4c21.8 1.9 43.3 6.7 64 14.4V244.2l22.7 6.7c13.5 4 27.3 6.4 41.3 7.4V194c-7.8-.8-15.6-2.3-23.2-4.5l-40.8-12v-62c-13-3.8-25.8-8.8-38.2-15c-8.2-4.1-16.9-7-25.8-8.8v72.4c-13-.4-26 .8-38.7 3.6L128 173.2V98L64 114v73.1zM320 335.7c16.8 1.5 33.9-.7 50-6.8l14-5.2V251.9l-7.9 1.8c-18.4 4.3-37.3 5.7-56.1 4.5v77.4zm64-149.4V115.4c-20.9 6.1-42.4 9.1-64 9.1V194c13.9 1.4 28 .5 41.7-2.6l22.3-5.2z"/></svg>

                            </div>

                            <div class="title-dashboard">

                                <span><strong>Experiences Completed</strong></span>
                            </div>
                        </div>


                        <div class="float-none mt-5">
                            <div>
                                <span class="text-corporate-dark-color">
                                    {{$viewData->attendedStats()->attendedPercetage()}}% Attended at least 1 / {{$viewData->attendedStats()->notAttendedPercetage()}}% have not attended/registered
                                </span>
                                <div class="bar-dashboard-big-background">
                                    <div class="bar-dashboard-big-fill color-bar-extra" style="width:{{$viewData->attendedStats()->attendedPercetage()}}%;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </div>

        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <a class="a-title">
                    <div class="fw-bold">
                        Attended Experiences
                    </div>
                </a>
            </div>

            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-6">
                        <div class="input-group rounded">
                            <input type="search" id="query-search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-group rounded">
                            <select class="form-select " aria-label="" id="course-id">
                                <option value="">Filters</option>
                                @foreach ($viewData->activeCoursesSortByName() as $activeCourse)
                                    <option value="{{$activeCourse->id}}">{{$activeCourse->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card float-none margin-top-10 card-list-courses-instructor">

            <div class="card-body p-0" id="div-experiences-table">
                @include('instructor.experiences.experience_table', ['experiences' => $viewData->experiencesList()->get()])
            </div>
        </div>

        <div class="row">

            <div class="col-12 mt-4 d-flex justify-content-between">

                <a href="{{route('get.instructor.experiences.list', ['status' => 'past'])}}"
                   class="p-1 border fw-bold shadow-sm text-warning-dark-2" title="Past Experiences">
                    Showing Past Experiences
                </a>
                <a href="{{route('get.instructor.experiences.list')}}" class="border p-1 fw-bold text-success" title="Show upcoming experiences">
                    Showing Upcoming Experiences
                </a>

            </div>
        </div>
    </div>

    <script>

        $(document).ready(function () {

            jQuery.ajaxSetup({cache: false});

            var timeoutId;
            $("#query-search").on('input', function () {

                clearTimeout(timeoutId);

                timeoutId = setTimeout(function () {
                    searchExperiences()
                }, 500); //

            });

            jQuery(document).on('change', '#course-id', function (event) {
                var courseId = $(this).val()
                searchExperiences()
            });

            function searchExperiences() {

                jQuery.ajax({
                    url: '{{route('post.instructor.experiences.search')}}',
                    type: "POST",
                    dataType: "html",

                    data: {
                        'query': $('#query-search').val(),
                        'course_id': $('#course-id').val(),
                    },
                    context: this,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response, data) {

                        $("#div-experiences-table").hide().html(response).fadeIn(300);

                    },
                    error: function (response, textStatus, xhr) {
                        if (response.status != 422) {
                            $.notify(response.responseText, {className: "error", position: "top-center", showDuration: 400, hideDuration: 400, autoHideDelay: 2000,});
                        }

                    },
                    statusCode: {

                        422: function (data) {
                            $.notify('Value is required.', {className: "error", position: "top-center", showDuration: 400, hideDuration: 400, autoHideDelay: 2000,});
                        }
                    }
                });
            }
        });

    </script>

@endsection