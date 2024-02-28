
@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12">
        <span class="text-corporate-dark-color box_sessions_tag"><strong>Active Courses </strong></span> Summer,2023
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
            <a class="dropdown-item cursor_pointer" href="{{route('get.instructor.course.active.index')}}">
                 All Courses
            </a>
            @foreach ($data->courses() as $course)
            <a class="dropdown-item cursor_pointer" href="{{route('get.instructor.course.active.index', $course->id)}}">
                {{$course->name}}
            </a>
            @endforeach
        </div>


    </div>

    <div class="col-md-6">

        <a href="{{route('get.instructor.course.index')}}">
        <div class="text-corporate-dark-color text-right cursor_pointer">
            <strong>See course view</strong>
        </div>
        </a>

    </div>

</div>


<div class="row margin-top-10">

    <div class="col-md-12">
            <div class="text-left">
                @if(session('success'))
                    <div id="successMessage" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div id="errorMessage" class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>

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

<div class="card float-none margin-top-10 card-list-courses-instructor">

    <div class="card-body">

        <div class="row">
            <div class="col-12 mb-3">
                <a class="a-title text-corporate-color" href="#"><u>Download list</u></a>
            </div>
        </div>

        <table id="table-instructor" class="table" data-paging="false" data-searching="false" data-ordering="false">
            <thead>
                <tr>
                    <th class="">
                        CREATED
                    </th>
                    <th class="">SESSIONS</th>
                    <th class="">COURSE</th>
                    <th>SECTION</th>
                    <th>COACHING PERIOD</th>
                    <th>REGISTERED STUDENTS</th>
                    <th>CLASS ID/INSTRUCTIONS</th>
                    <th>INSTRUCTOR</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>

            <tbody>

                @forelse ($data->commonResponse()->sections() as $section)
                @if ($section->course->isActive())
                <tr>
                    <td class="text-corporate-color">
                        <u><strong>{{$section->course->created_at->format('M d, y')}}</strong></u>
                    </td>
                    <td><u>1</u></td>
                    <td class="cursor_pointer">
                        <a class="a-title" href="{{route('get.instructor.course.show', $section->course_id)}}" title="Show course"><u> {{$section->course->name}}</u></a>
                    </td>
                    <td>
                        <u>{{$section->name}}</u>
                    </td>

                    @if($section->course->isFlex())
                    <td>{{$section->course->firstDate()->format('m/d/y')}} - {{$section->course->lastDate()->format('m/d/y')}}  </td>
                    @else

                        @if($section->course->hasCoachingWeek())
                        <td>{{$section->course->firstDate()->format('m/d/y')}} - {{$section->course->lastDate()->format('m/d/y')}}  </td>
                        @else
                        <td>MM/DD/YY - MM/DD/YY</td>
                        @endif
                    @endif
                    <td class="text-center">{{$section->enrollment()->count()}}/{{$section->num_students}}</td>
                    <td class="text-center">
                        <a class="a-title" href="{{route('get.common.course.section.file.instructions.download', $section->id)}}"><u>{{$section->code}}</u></a>
                    </td>
                    <td>{{$section->instructor->writeFullName()}}</td>
                    <td>
                        <select class="form-select form-select-sm select-close-course" aria-label=".form-select-sm example" onchange="changeFunc(this.value);">
                            <option value="">Actions</option>
                            <option value="{{route('get.instructor.course.show', $section->course_id)}}">See course information</option>
                            <option value="{{route('get.common.course.section.file.instructions.download', $section->id)}}">Download Instructions</option>
                            <option value="{{route('get.admin.course.coaching_form.course_assignment', $section->course->id)}}?sectionToExpand={{$section->id}}">
                                Add conversation guides
                            </option>
                            <option value="">Add make-up for purchase for all</option>
                            <option value="">Download attendance report</option>
                            <option value="{{route('get.admin.course.coaching_form.update.course_information', $section->course->id)}}">
                                Edit Coaching Form
                            </option>
                            <option value="modalCloseCourse" data-idSection={{$section->course_id}}>Close course</option>
                            <option value="modalDuplicateCourse">Duplicate Coaching Form</option>
                        </select>

                    </td>

                </tr>
                @endif
                @empty
                    <tr>
                        <td>
                            <span class=" text-white bg-warning px-2 py-1 rounded ">No sections</span>
                        </td>
                    </tr>
                @endforelse

            </tbody>
        </table>

    </div>

</div>

<div class="modal fade bd-example-modal-lg" id="modalDuplicateCourse" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-content">
            <form method="POST" action="{{route('get.admin.course.coaching_form.update.course_information', $section->course_id)}}" enctype="multipart/form-data">
            @csrf
                <div class="modal-header">
                    <h4 class="modal-tittle" style="color:white;"><span class="title-form">DUPLICATE COURSE</span></h4>
                </div>

                <div class="modal-body" id="modal-container">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="term_activeCourse">Term</label>
                                <select class="form-control" name="term_activeCourse" id="term_activeCourse"
                                style="text-transform: uppercase;">
                                    <option value="" selected>Select semester</option>
                                    @foreach($semesters as $semester)
                                    <option value="{{$semester->id}}">{{$semester->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label for="year_activeCourse">Year</label>
                                <select class="form-control" name="year_activeCourse" id="year_activeCourse"
                                style="text-transform: uppercase;">
                                    <option value="" selected>Select year</option>
                                    @foreach($arrayYears as $arrayYear)
                                    <option value="{{$arrayYear}}">{{$arrayYear}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="startDate_activeCourse">Academic Course Start Date</label>
                                <input type="date" class="form-control" name="startDate_activeCourse" id="startDate_activeCourse"
                                style="text-transform: uppercase;" required>
                            </div>

                            <div class="col-sm-6">
                                <label for="endDate_activeCourse">Academic Course End Date</label>
                                <input type="date" class="form-control" name="endDate_activeCourse" id="endDate_activeCourse"
                                style="text-transform: uppercase;" required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer d-flex">
                    <div>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="cancelDuplicate">
                            <i class="fa fa-undo" style="font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Cancel
                        </button>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save" style="font-size:15px;"></i>&nbsp;&nbsp;&nbsp;Duplicate
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalCloseCourse" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-content">
            <form method="POST" action="{{route('post.admin.course.coaching_form.close.course', 1)}}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="idSection" id="idSection" hidden>
                <div class="modal-body">
                    <h4 class="modal-tittle" style="color:white;"><span class="title-form">CLOSE COURSE</span></h4>
                    <p>Now that your course has ended, it will be moved to Past Courses.</p>
                </div>

                <div style="padding: 0px 15px 10px 15px; display: flex; justify-content: space-between;">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" id="cancelButton">Cancel</button>
                    <button type="submit" class="btn btn-sm bg-text-corporate-color" style="color:white">OK</button>  
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("cancelButton").addEventListener("click", function() {
            var selects = document.querySelectorAll('.form-select');
            selects.forEach(function(select) {
                select.value = '';
            });
        });
        document.getElementById("cancelDuplicate").addEventListener("click", function() {
            var selects = document.querySelectorAll('.form-select');
            selects.forEach(function(select) {
                select.value = '';
            });
        });
    });


    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.display = 'none';
        }
    }, 3000);
    setTimeout(function() {
        var errorMessage = document.getElementById('errorMessage');
        if (errorMessage) {
            errorMessage.style.display = 'none';
        }
    }, 3000);
</script>

<script>
function changeFunc(id){
    if(id =="modalDuplicateCourse") {
        $("#modalDuplicateCourse").modal('show');
    }
    else if (id == "modalCloseCourse") {
        var idSectionValue = $("option[value='modalCloseCourse']:selected").data("idsection");
        $("#idSection").val(idSectionValue);
        $("#modalCloseCourse").modal('show');
    }
    else {
        document.write("no se ejecuto la funcion");
    }
}
</script>

@endsection
