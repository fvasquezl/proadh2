<div class="card card-outline card-success">
    <div class="card-body">

        <div class="form-group">
            <label class="form-control-label" for="name">User</label>
            <input type="text" name="brand"
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
            <label class="form-control-label" for="username">Username</label>
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
            <label class="form-control-label" for="email">Email</label>
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

           The password will be send to the user email

        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
</div>
