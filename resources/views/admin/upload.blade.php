@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-block">
                {!!   Form::open(['route' => 'file.upload', 'method' => 'post','files'=>'true']) !!}
                <div class="form-group">
                    {{ Form::label('name of the file', 'Name', ['class' => 'control-label']) }}
                    {{ Form::text('name', '', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('please select file to upload', '', ['class' => 'control-label']) }}
                    {{ Form::file('file', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description', 'Description', ['class' => 'control-label']) }}
                    {{ Form::textarea('description', '', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::submit('Submit', ['class' => 'btn btn-success-outline btn-block']) }}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@section('footer-scripts')
@stop
