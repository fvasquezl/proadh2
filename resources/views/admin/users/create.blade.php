@extends('layouts.master')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Users</li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form autocomplete="off" method="post" action="{{route('admin.users.store')}}">
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header"><h4>Add Users</h4></div>
                    <div class="card-body">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" name="name"
                                       class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Name...') }}"
                                       value="{{ old('name') }}"
                                       autocomplete="name" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label class="form-control-label" for="username">Username</label>
                                <input type="text" name="username"
                                       class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Username...') }}"
                                       value="{{ old('username') }}"
                                       autocomplete="username" required>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group ">
                                <label class="form-control-label" for="inputEmail">Email</label>
                                <input type="email" name="email"
                                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       placeholder="{{ __('Email...') }}" value="{{ old('email') }}"
                                       autocomplete="email" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group ">
                               The password will be automatic generate and send to the user
                            </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
