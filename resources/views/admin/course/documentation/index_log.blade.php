@extends('layouts.app_modal')

@section('content')

    <div class="row mt-3">

        <div class="col-12">
            <h6 class="text-decoration-underline text-corporate-color">Registro de envío de documentación del curso</h6>
        </div>

        <div class="col-12 table-responsive mt-3">
            <table class="table table-bordered">
                <thead>
            <tr>
                <th>Sender</th>
                <th>Recipient</th>
                <th>Description</th>
                <th>When?</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($data->records() as $record)
                @php $activity = $record->buildActivity() @endphp
                <tr>
                    <td>{{ $activity->sender()->writeFullName() }}</td>
                    <td>{{ $activity->recipient()->writeFullName() }}</td>
                    <td>{{ $activity->trans() }}</td>
                    <td>{{ toDatetimeInOneRow($activity->createdAt(), $timezone->name) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">
                        <span class="bg-warning text-white p-1 rounded">Data not found</span>
                    </td>
                </tr>
            @endforelse
            </tbody>
            </table>

        </div>

        <div class="col-12 mt-4 text-end">
            <a href="{{route('get.admin.course.documentation.send.confirm', $course)}}"
               class="btn btn-sm btn-primary"
               onclick="return confirm('Are you sure to send all the documentation of the course?');">
                <i class="fa fa-envelope"></i> Send
            </a>
        </div>
    </div>

@endsection
