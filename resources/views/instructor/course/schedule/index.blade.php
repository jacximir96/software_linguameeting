@extends('layouts.app')

@section('content')

    @include('instructor.course.schedule.section_flex_browser')

    @include('instructor.course.schedule.section_coaches')

    <div class="row">
        <div class="col-12">
            <div class="card my-3">
                <div class="card-header p-2 d-flex justify-content-between bg-corporate-color-light text-corporate-dark-color fw-bold">
                    <h6 class="m-0 font-weight-bold"><i class="fa fa-calendar-week"></i> Schedule</h6>
                    <a href="#" class="text-corporate-dark-color fw-bold small text-decoration-underline" id="show-all-sessions-link">Remove Filters</a>
                </div>
                <div class="card-body padding-05-rem">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 9%">Hour</th>

                                <th style="">Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>


                        </tr>
                        </thead>
                        <tbody>

                                <tr>
                                    <td>
                                        08:00
                                    </td>

                                        <td class="text-center">
                                            @include('instructor.course.schedule.sessions_by_day')
                                        </td>

                                </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('instructor.course.schedule.javascript')

@endsection
