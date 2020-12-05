@extends('layouts.guest')

@section('content')
    <div class="card">
        <div class="card-body register-card-body">

            <p class="login-box-msg">Register a new membership</p>

            <form class="form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-group {{ $errors->has('name') ? ' is-invalid' : '' }} mb-3">
                    <input type="text" name="name" class="form-control"
                           placeholder="{{ __('Name...') }}"
                           value="{{ old('name') }}"
                           autocomplete="name"
                           required
                           autofocus
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @if ($errors->has('name'))
                        <div id="name-error" class="error text-danger pl-3" for="name"
                             style="display: block;">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="input-group {{ $errors->has('username') ? ' is-invalid' : '' }} mb-3">
                    <input type="text" name="username" class="form-control"
                           placeholder="{{ __('Username...') }}"
                           value="{{ old('username') }}"
                           autocomplete="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-fingerprint"></span>
                        </div>
                    </div>
                    @if ($errors->has('username'))
                        <div id="name-error" class="error text-danger pl-3" for="username"
                             style="display: block;">
                            <strong>{{ $errors->first('username') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="input-group {{ $errors->has('email') ? ' is-invalid' : '' }} mb-3">
                    <input type="email" name="email" class="form-control"
                           placeholder="{{ __('Email...') }}"
                           value="{{ old('email') }}"
                           autocomplete="email"
                           required
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <div id="name-error" class="error text-danger pl-3" for="email"
                             style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif
                </div>

                <div class="input-group {{ $errors->has('password') ? ' is-invalid' : '' }}mb-3">
                    <input type="password" name="password" id="password" class="form-control"
                           placeholder="{{ __('Password...') }}"
                           required
                           autocomplete="new-password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <div id="password-error" class="error text-danger pl-3" for="password"
                             style="display: block;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="input-group {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }} mb-3">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           class="form-control" placeholder="{{ __('Confirm Password...') }}" required
                           autocomplete="new-password">

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <div id="password_confirmation-error" class="error text-danger pl-3"
                             for="password_confirmation" style="display: block;">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <p class="text-center">
        <a href="{{route('login')}}" class="btn btn-link">
            {{ __('I already have an account')}}
        </a>
    </p>
@endsection
