<div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h4>Personal data</h4>
            </div>

            <div class="card-body">

                <div class="form-group">
                    <label class="form-control-label" for="name">User:</label>
                    <input type="text" name="name"
                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('User...') }}"
                           value="{{ old('name',$user->name) }}"
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
                           value="{{ old('username',$user->username) }}"
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
                           value="{{ old('email',$user->email) }}"
                           autocomplete="email" required
                    >
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                    @endif
                </div>

                <div class="form-group ">
                    <label class="form-control-label" for="password">Password:</label>
                    <input type="password" name="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('Password...') }}"
                           autocomplete="password"
                    >
                    <span class="note-help-block">Leave empty, if you don't want replace password</span>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
                <div class="form-group ">
                    <label class="form-control-label" for="password_confirmation">Confirm Password:</label>
                    <input type="password" name="password_confirmation"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="{{ __('Confirm password...') }}"
                           autocomplete="password"
                    >

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert" style="display: block;">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h4>Roles</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.users.roles.update',$user)}}">
                    @csrf
                    @method('PUT')
                    @include('admin.users.roles.checkboxes')
                    <button class="btn btn-primary btn-block">Update Roles</button>
                </form>
            </div>
        </div>
        <div class="card card-outline card-success">
            <div class="card-header">
                <h4>Permissions</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('admin.users.permissions.update',$user)}}">
                    @csrf
                    @method('PUT')
                    @include('admin.users.permissions.checkboxes')
                    <button class="btn btn-primary btn-block">Update Permissions</button>
                </form>
            </div>
        </div>
    </div>
</div>
