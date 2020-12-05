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
                @include('admin.users.form',['user'=>$user])
            </form>
        </div>
    </div>
@endsection
