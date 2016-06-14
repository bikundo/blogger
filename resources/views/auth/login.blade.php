@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-block row">
                        <form class="form" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class=" control-label">E-Mail Address</label>
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class=" control-label">Password</label>
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>
                                <hr>
                                <a href="{!! url('/register') !!}" class="btn btn-primary-outline btn-block">
                                    Open an account</a>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your
                                    Password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
