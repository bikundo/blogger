@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card card-inverse card-info text-xs-center">
            <div class="card-block">
                <h3 class="card-title">
                    {!! $file->name !!}
                </h3>
                <blockquote class="card-blockquote">
                    <p>{!! $file->description !!}</p>

                </blockquote>
                <div class="m-t-2">
                    {!! $file->created_at->toDayDateTimeString() !!}
                </div>
            </div>
        </div>
        <a href="{!! route('download.file',$file->id) !!}" class="btn btn-block btn-success-outline">download</a>

    </div>
@endsection
@section('footer-scripts')
@stop
