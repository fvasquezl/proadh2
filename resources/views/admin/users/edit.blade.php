@extends('layouts.master')
@section('header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users Administration</h1>
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
        <form method="POST" action="{{route('admin.users.update',$user)}}">
            @csrf
            @method('PUT')
            @include('admin.users.form',['user'=>$user,'roles'=>$roles,'permissions'=>$permissions])
        </form>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $(".alert").delay(2000).slideUp(300);
        });
    </script>
@endpush
