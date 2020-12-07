@extends('layouts.master')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Cars</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Cars</li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <form autocomplete="off" method="post" action="{{route('admin.users.store')}}">
                @csrf
                <div class="card card-outline card-primary">
                    <div class="card-header"><h4>Create New Car</h4></div>
                    <div class="card-body">
                        <div class="form-group">
                            <label class="form-control-label" for="brand">Brand</label>
                            <input type="text" name="brand"
                                   class="form-control {{ $errors->has('brand') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Brand...') }}"
                                   value="{{ old('brand') }}"
                                   autocomplete="brand" required autofocus
                            >
                            @if ($errors->has('brand'))
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <label class="form-control-label" for="model">Model</label>
                            <input type="text" name="model"
                                   class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}"
                                   placeholder="{{ __('Model...') }}"
                                   value="{{ old('model') }}"
                                   autocomplete="model" required
                            >
                            @if ($errors->has('model'))
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('details') ? ' is-invalid' : '' }}">
                            <label for="details">Details</label>
                            <textarea class="form-control{{ $errors->has('details') ? ' is-invalid' : '' }}"
                                      id="details"
                                      rows="3"
                                      placeholder="{{ __('Details...') }}"></textarea>
                            @if ($errors->has('details'))
                                <span class="invalid-feedback" role="alert" style="display: block;">
                                    <strong>{{ $errors->first('details') }}</strong>
                                </span>
                            @endif
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

