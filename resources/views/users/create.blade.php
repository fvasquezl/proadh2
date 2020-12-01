@extends('layouts.main')

@section('content')
    <div class="col-lg-6">
        <div class="panel panel-primary  panel-bordered">
            <div class="panel-heading">
                <h3 class="panel-title">Create Users</h3>
            </div>
            <form autocomplete="off" method="post" action="{{route('users.store')}}">
                @csrf
                <div class="panel-body">
                    <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }} form-material">
                        <label class="form-control-label" for="name">Name</label>
                        <input type="text" name="name" class="form-control"
                               placeholder="{{ __('Name...') }}"
                               value="{{ old('name') }}"
                               autocomplete="name" required autofocus>
                    </div>
                    @if ($errors->has('name'))
                        <div id="name-error" class="error text-danger pl-3" for="name"
                             style="display: block;">
                            <strong>{{ $errors->first('name') }}</strong>
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }} form-material">
                        <label class="form-control-label" for="username">Username</label>
                        <input type="text" name="username" class="form-control"
                               placeholder="{{ __('Username...') }}"
                               value="{{ old('username') }}"
                               autocomplete="username" required>
                    </div>
                    @if ($errors->has('username'))
                        <div id="username-error" class="error text-danger pl-3" for="username"
                             style="display: block;">
                            <strong>{{ $errors->first('username') }}</strong>
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }} form-material">
                        <label class="form-control-label" for="inputEmail">Email</label>
                        <input type="email" name="email" class="form-control"
                               placeholder="{{ __('Email...') }}" value="{{ old('email') }}"
                               autocomplete="email" required>

                    </div>
                    @if ($errors->has('email'))
                        <div id="email-error" class="error text-danger pl-3" for="email"
                             style="display: block;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif

                    <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }} form-material">
                        <label class="form-control-label" for="username">Username</label>
                        <input type="password" name="password" class="form-control"
                               placeholder="{{ __('Password...') }}"
                               value="{{ old('password') }}"
                               autocomplete="password" required>
                    </div>
                    @if ($errors->has('password'))
                        <div id="password-error" class="error text-danger pl-3" for="password"
                             style="display: block;">
                            <strong>{{ $errors->first('password') }}</strong>
                        </div>
                    @endif
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-classic ">Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
