@extends('layouts.admin')
<style>
    .img-responsive {
        width: 100%;
        height: auto;
    }

    .card {
        min-height: 160px;
    }
</style>
@section('content')
    <div class="container">
        <div class="row card-deck-wrapper">
            @foreach($files as $file)
                <a href="{!! route('view.file',$file->id) !!}">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="card card-inverse card-success text-xs-center">
                            <div class="card-block">
                                <blockquote class="card-blockquote">
                                    <p>{!!  $file->name  !!}</p>
                                </blockquote>
                            </div>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
