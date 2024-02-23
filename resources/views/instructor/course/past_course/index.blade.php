@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <span class="text-corporate-dark-color box_sessions_tag"><strong>Past Courses </strong></span> Summer,2023
    </div>
</div>

<div class="row margin-top-20">

    <div class="col-md-6">

        <div class="cursor_pointer custom-color-background-instructor padding-5" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <span class="text-corporate-dark-color align-svg">
                <svg fill="#186e74" xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34zm192-34l-136-136c-9.4-9.4-24.6-9.4-33.9 0l-22.6 22.6c-9.4 9.4-9.4 24.6 0 33.9l96.4 96.4-96.4 96.4c-9.4 9.4-9.4 24.6 0 33.9l22.6 22.6c9.4 9.4 24.6 9.4 33.9 0l136-136c9.4-9.2 9.4-24.4 0-33.8z"/></svg>

            </span>

            @if ($courseSelected>0)
            @foreach ($data->courses() as $course)
            <span class="box_sessions_tag" id="selectName"><strong>{{$course->name}}</strong></span>
            @endforeach
            @else
            <span class="box_sessions_tag" id="selectName"><strong> All Courses</strong></span>
            @endif
        </div>

        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton2">
            <div class="dropdown-item cursor_pointer">
                 All Courses
            </div>
            @foreach ($data->courses() as $course)
            <a class="dropdown-item cursor_pointer" href="{{route('get.instructor.course.past_course.index', $course->id)}}">
                {{$course->name}}
            </a>
            @endforeach
        </div>


    </div>

</div>


<div class="row margin-top-10">

    <div class="col-md-12">

            <div class="text-right  float-end">
                <div class="input-group rounded">
                    <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

    </div>

</div>

@if (count($data->courses())>0)
@include('instructor.course.past_course.table', [
'sections' => $data->commonResponse()->sections(),
])
@else
@include('admin.instructor.card.no_data', [
'message' => "There are not past courses"
])
@endif



@endsection
