@extends('layouts.master')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users <small class="text-gray">show</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Users</li>
                    <li class="breadcrumb-item active">Show</li>
                </ol>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{asset('img/user1.png')}}"
                             alt="{{$user->name}}">
                    </div>

                    <h3 class="profile-username text-center">{{$user->name}}</h3>

                    <p class="text-muted text-center">{{$user->getRolenames()->implode(', ')}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$user->email}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Cars</b> <a class="float-right">{{$user->cars->count()}}</a>
                        </li>
                        @if($user->roles->count())
                        <li class="list-group-item">
                            <b>Roles</b> <a class="float-right">{{$user->getRolenames()->implode(', ')}}</a>
                        </li>
                        @endif
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Edit</b></a>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-primary card-outline with-border">
                <div class="card-header card-title">
                    Cars
                </div>
                <div class="card-body box-profile">
                    @forelse($user->cars as $car)
                        <a href="{{route('admin.cars.show',$car)}}" target="_blank">
                            <strong>{{$car->brand}} - {{$car->model}}</strong>
                        </a>
                       <br>
                        <small class="text-muted">Created at {{$car->created_at->format('d/m/Y')}}</small><br>
                        <small class="text-muted">{{$car->details}}</small>
                        @unless($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">User doesn't have any car registered</small>
                    @endforelse
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-primary card-outline with-border">
                <div class="card-header card-title">
                    Roles
                </div>
                <div class="card-body box-profile">
                    @forelse($user->roles as $role)
                        <strong>{{$role->name}}</strong>
                        <br>
                        @if($role->permissions->count())
                            <small class="text-muted">Persmissions:
                                {{$role->permissions->pluck('name')->implode(', ')}}
                            </small>
                        @endif
                        @unless($loop->last)
                            <hr>
                        @endunless
                        @empty
                            <small class="text-muted">User doesn't have roles</small>
                    @endforelse
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-md-3">
            <div class="card card-primary card-outline with-border">
                <div class="card-header card-title">
                    Additional Permissions
                </div>
                <div class="card-body box-profile">
                    @forelse($user->permissions as $permission)
                        <strong>{{$permission->name}}</strong>
                        <br>
                        @unless($loop->last)
                            <hr>
                        @endunless
                    @empty
                        <small class="text-muted">User doesn't have additional permissions</small>
                    @endforelse

                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>

@endsection

