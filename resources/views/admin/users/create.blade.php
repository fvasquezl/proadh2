@extends('layouts.master')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users <small class="text-gray">Create a new user</small></h1>
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
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h4>Personal data</h4>
                </div>

                <div class="card-body">
                    <form method="post" action="{{route('admin.users.store')}}">
                        @csrf
                        <div class="form-group">
                            <label class="form-control-label" for="name">User:</label>
                            <input type="text" name="name"
                                   class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('User...') }}"
                                   value="{{ old('name') }}"
                                   autocomplete="name" required autofocus
                            >
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label class="form-control-label" for="username">Username:</label>
                            <input type="text" name="username"
                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Username...') }}"
                                   value="{{ old('username') }}"
                                   autocomplete="username" required
                            >
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label class="form-control-label" for="email">Email:</label>
                            <input type="email" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Email...') }}"
                                   value="{{ old('email') }}"
                                   autocomplete="email" required
                            >
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Roles</label>
                                @include('admin.users.roles.checkboxes')
                            </div>
                            <div class="form-group col-md-6">
                                <label>Permissions</label>
                                @include('admin.users.permissions.checkboxes')
                            </div>
                        </div>
                        <span class="note-help-block">The password will be sent to new user by email</span>
                        <button type="submit" class="btn btn-primary btn-block">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $(".alert").delay(2000).slideUp(300);
        });
    </script>
@endpush
