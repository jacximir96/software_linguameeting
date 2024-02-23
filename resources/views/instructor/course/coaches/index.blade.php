@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <span class="text-corporate-dark-color box_sessions_tag"><strong>Coaches </strong></span>
    </div>
</div>

<div class="row margin-top-20">
    
    <div class="col-md-6">
        
        <div class="cursor_pointer custom-color-background-instructor padding-5" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            
            <span class="text-corporate-dark-color align-svg">
                <svg fill="#186e74" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"/></svg>
            
            </span>
            
                <span class="box_sessions_tag"><strong> All Courses</strong></span> 
        </div>

        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton2">
            <div class="dropdown-item cursor_pointer">
                 All Courses
            </div>
            <div class="dropdown-item cursor_pointer">Summer, 2023. SPAN 1501 Intermediate</div>
            <div class="dropdown-item cursor_pointer">Summer, 2023. SPAN 1502 Intermediate</div>
            <div class="dropdown-item cursor_pointer">Summer, 2023. SPAN 1503 Intermediate</div>
        </div>


    </div>

</div>

<div class="row">
    
    <div class="col-md-3 mt-3">
        <div class="card card-course-dashboard">

            <div class="card-body float-none text-center">

                <div class="row margin-top20 mt-2">
                    <div class="col-md-6 cursor_pointer text-corporate-dark-color" data-toggle="modal" data-target="#feedbackLingua1">
                        <strong>View Linguameeting Feedback</strong>
                    </div>

                    <div class="col-md-6 cursor_pointer text-corporate-color text-center" data-toggle="modal" data-target="#feedbackInst1">
                        <strong>Instructor's Feedback</strong>
                    </div>

                </div>

                <div class="margin-top-20 text-14">
                    Name: <span class="text-18"><strong>Maria Centeno</strong></span>
                </div>
                <div class="margin-top-10 text-14">
                    Country: <span class="text-18"><strong>Ecuador</strong></span>
                </div>

                <div class="margin-top-10">
                    <img src="{{asset('assets/img/flags/am.png')}}" class="flag_coach_attendance"/>
                </div>

                <div class="margin-top-10 cursor_pointer text-corporate-color text-14" data-toggle="modal" data-target="#modal1">
                    <b>View More</b>
                </div>

                <div class="mean_stars margin-top10 margin-auto" data-rate-value="4.8">
                </div>

                <div class="margin-top-20">
                    <img src="{{asset('assets/img/coaches/coach_190.png')}}" class="img_coach_attendance"/>
                </div>

            </div>
            
        </div>
    </div>

    <div class="col-md-3 mt-3">
        <div class="card card-course-dashboard">

            <div class="card-body float-none text-center">

                <div class="row margin-top20 mt-2">
                    <div class="col-md-6 cursor_pointer text-corporate-dark-color" data-toggle="modal" data-target="#feedbackLingua1">
                        <strong>View Linguameeting Feedback</strong>
                    </div>

                    <div class="col-md-6 cursor_pointer text-corporate-color text-center" data-toggle="modal" data-target="#feedbackInst1">
                        <strong>Instructor's Feedback</strong>
                    </div>

                </div>

                <div class="margin-top-20 text-14">
                    Name: <span class="text-18"><strong>Maria Centeno</strong></span>
                </div>
                <div class="margin-top-10 text-14">
                    Country: <span class="text-18"><strong>Ecuador</strong></span>
                </div>

                <div class="margin-top-10">
                    <img src="{{asset('assets/img/flags/am.png')}}" class="flag_coach_attendance"/>
                </div>

                <div class="margin-top-10 cursor_pointer text-corporate-color text-14" data-toggle="modal" data-target="#modal1">
                    <b>View More</b>
                </div>

                <div class="mean_stars margin-top10 margin-auto" data-rate-value="4.8">
                </div>

                <div class="margin-top-20">
                    <img src="{{asset('assets/img/coaches/coach_38.png')}}" class="img_coach_attendance"/>
                </div>

            </div>
            
        </div>
    </div>
    
    <div class="col-md-3 mt-3">
        <div class="card card-course-dashboard">

            <div class="card-body float-none text-center">

                <div class="row margin-top20 mt-2">
                    <div class="col-md-6 cursor_pointer text-corporate-dark-color" data-toggle="modal" data-target="#feedbackLingua1">
                        <strong>View Linguameeting Feedback</strong>
                    </div>

                    <div class="col-md-6 cursor_pointer text-corporate-color text-center" data-toggle="modal" data-target="#feedbackInst1">
                        <strong>Instructor's Feedback</strong>
                    </div>

                </div>

                <div class="margin-top-20 text-14">
                    Name: <span class="text-18"><strong>Maria Centeno</strong></span>
                </div>
                <div class="margin-top-10 text-14">
                    Country: <span class="text-18"><strong>Ecuador</strong></span>
                </div>

                <div class="margin-top-10">
                    <img src="{{asset('assets/img/flags/am.png')}}" class="flag_coach_attendance"/>
                </div>

                <div class="margin-top-10 cursor_pointer text-corporate-color text-14" data-toggle="modal" data-target="#modal1">
                    <b>View More</b>
                </div>

                <div class="mean_stars margin-top10 margin-auto" data-rate-value="4.8">
                </div>

                <div class="margin-top-20">
                    <img src="{{asset('assets/img/coaches/coach_214.png')}}" class="img_coach_attendance"/>
                </div>

            </div>
            
        </div>
    </div>
    
    <div class="col-md-3 mt-3">
        <div class="card card-course-dashboard">

            <div class="card-body float-none text-center">

                <div class="row margin-top20 mt-2">
                    <div class="col-md-6 cursor_pointer text-corporate-dark-color" data-toggle="modal" data-target="#feedbackLingua1">
                        <strong>View Linguameeting Feedback</strong>
                    </div>

                    <div class="col-md-6 cursor_pointer text-corporate-color text-center" data-toggle="modal" data-target="#feedbackInst1">
                        <strong>Instructor's Feedback</strong>
                    </div>

                </div>

                <div class="margin-top-20 text-14">
                    Name: <span class="text-18"><strong>Maria Centeno</strong></span>
                </div>
                <div class="margin-top-10 text-14">
                    Country: <span class="text-18"><strong>Ecuador</strong></span>
                </div>

                <div class="margin-top-10">
                    <img src="{{asset('assets/img/flags/am.png')}}" class="flag_coach_attendance"/>
                </div>

                <div class="margin-top-10 cursor_pointer text-corporate-color text-14" data-toggle="modal" data-target="#modal1">
                    <b>View More</b>
                </div>

                <div class="mean_stars margin-top10 margin-auto" data-rate-value="4.8">
                </div>

                <div class="margin-top-20">
                    <img src="{{asset('assets/img/coaches/coach_165.png')}}" class="img_coach_attendance"/>
                </div>

            </div>
            
        </div>
    </div>
    
    <div class="col-md-3 mt-3">
        <div class="card card-course-dashboard">

            <div class="card-body float-none text-center">

                <div class="row margin-top20 mt-2">
                    <div class="col-md-6 cursor_pointer text-corporate-dark-color" data-toggle="modal" data-target="#feedbackLingua1">
                        <strong>View Linguameeting Feedback</strong>
                    </div>

                    <div class="col-md-6 cursor_pointer text-corporate-color text-center" data-toggle="modal" data-target="#feedbackInst1">
                        <strong>Instructor's Feedback</strong>
                    </div>

                </div>

                <div class="margin-top-20 text-14">
                    Name: <span class="text-18"><strong>Maria Centeno</strong></span>
                </div>
                <div class="margin-top-10 text-14">
                    Country: <span class="text-18"><strong>Ecuador</strong></span>
                </div>

                <div class="margin-top-10">
                    <img src="{{asset('assets/img/flags/am.png')}}" class="flag_coach_attendance"/>
                </div>

                <div class="margin-top-10 cursor_pointer text-corporate-color text-14" data-toggle="modal" data-target="#modal1">
                    <b>View More</b>
                </div>

                <div class="mean_stars margin-top10 margin-auto" data-rate-value="4.8">
                </div>

                <div class="margin-top-20">
                    <img src="{{asset('assets/img/coaches/coach_165.png')}}" class="img_coach_attendance"/>
                </div>

            </div>
            
        </div>
    </div>

</div>

<div id="modal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-corporate-color text-white">
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">

                        <div class="elena-div padding-top20">
                            <img class="" src="{{asset('assets/img/coaches/coach_190.png')}}" alt="Maria Centeno">

                        </div>

                        <div class="text-corporate-dark-color text-20 mt-2 mb-2 ">
                            <b>Maria Centeno</b>
                        </div>

                        [s/if $coach->coach_video!=''/s]
                        <div class="col-md-12 margin-top-10">
                            <label class="btn text-corporate-color border-color2 cursor_pointer " data-toggle="modal" data-target="#videoCoach1">
                                See coach video
                                <i class="fas fa-play-circle text-corporate-color"></i>
                            </label>
                        </div>
                        [s//if/s]

                        <div class="nombre-coach text-20 mt-2 mb-2">
                            <b>DESCRIPTION</b>
                        </div>

                        <div class="descripcion_coach">
                            <p>
                                asdfasdfasdfasdf
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div id="videoCoach1" class="hidden-print modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="row margin-top40">
                        <div class="col-md-12">
                            <div class="video-youtube">
                                <iframe src="https://www.youtube.com/embed/Rd-3dgmFKJU" width="100%" height="400px" frameborder="0" allow="encrypted-media" allowfullscreen id="iframeVideo"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="feedbackInst1" class="hidden-print modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-18">

                    <div class="text-corporate-dark-color text-20" id="nameUpdate">
                        <strong>Instructor's Feedback Maria Centeno</strong>
                    </div>

                    <div class="row margin-top-20 text-corporate-color">
                        <div class="col-md-12">
                            <strong>Insert or modify your feedback for this coach:</strong>
                        </div>
                    </div>

                    <div class="row margin-top-20">
                        <div class="text-16 col-md-12">
                            <textarea class="form-control" id="feedbackInst[s/$coach->id_user/s]" rows="8" name="feedbackInst[s/$coach->id_user/s]">asdfasdf</textarea>
                        </div>

                    </div>

                    [s/if $coach->date_evaluation_other!=''/s]
                    <div class="row margin-top-20">
                        <div class="text-16 col-md-12 text-center">
                            Last feedback: 16 Sep 2021 - 03:24 PM
                        </div>

                    </div>
                    [s//if/s]

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn background_colorAAAAAA colorWhite" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn bg-corporate-color colorWhite" onclick="">Save</button>

                </div>

            </div>
        </div>
    </div>

    <div id="feedbackLingua1" class="hidden-print modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body text-18">

                    <div class="text-corporate-dark-color text-20" id="nameUpdate">
                        <strong>Linguameeting Feedback Maria Centeno</strong>
                    </div>

                    <div class="row margin-top-20">
                        <div class="text-16 col-md-6">
                            <a href="#" target="_blank" class="text-corporate-color" >
                                Feedback 1
                            </a>
                        </div>
                        <div class="text-16 col-md-6">
                            02 Nov 2023
                        </div>

                    </div>

                    [s/if $coach->feedbacks|count<=0/s]
                    <div class="text-16 row margin-top-20">
                        <div class="col-md-12">
                            No Feedback.
                        </div>

                    </div>
                    [s//if/s]

                </div>

            </div>
        </div>
    </div>


@endsection
