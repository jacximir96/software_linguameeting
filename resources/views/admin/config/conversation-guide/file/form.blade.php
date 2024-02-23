@extends('layouts.app_modal')

@section('content')

    @include('common.form_message_errors')

    {{ Form::model($form->model(),  [
   'class' => '',
   'url'=> $form->action(),
   'autocomplete' => 'off',
   'id' =>'conversation-guide-file-form',
      'files' => true,
   ]) }}

    <div class="row mt-3">
        <div class="col-12 col-sm-6">
            @include('common.form-field.text', ['field' => 'description', 'label' => 'Description'])
        </div>
    </div>

    @if ($form->isEdit())
        <div class="col-12 mt-3">
            <div class="container">
                <div class="row">
                    @if ($file)

                        <div class="col justify-content-start">
                            <a href="{{route('get.admin.config.conversation_guide.file.download', $file->id)}}" title="Download {{$file->original_name}}">
                                <i class="fa fa-download"></i> Download
                            </a>
                        </div>

                    @else
                        <div class="col-12 mt-2 text-danger">
                            No existe archivo
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
    <div class="col-12 mt-3">
        {{Form::file('file', ['class' => ''])}}

        @error('file')
        <span class="custom-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="row mt-3">
        <div class="col-12 text-end">
            <button class="btn btn-primary btn-sm btn-bold px-4" type="submit">
                Save
            </button>
        </div>
    </div>
    {{Form::close()}}

@endsection
