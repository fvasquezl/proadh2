<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('img/departamento.png')}}" alt="{{env('APP_NAME')}} Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('img/user1.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">OPTIONS</li>

                <li class="nav-item">
                    <a href="{{route('home')}}" class="{{setActiveRoute('home')}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="{{setOpenMenu(['admin.cars.index','admin.cars.create'])}}  ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Cars
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.cars.index')}}"
                               class="{{setActiveRoute('admin.cars.index')}}">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>All Cars</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.cars.create')}}"
                               class="{{setActiveRoute('admin.cars.create')}}">
                                <i class="nav-icon fas fa-pen"></i>
                                <p>Create New Car</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="{{setOpenMenu(['admin.users.index','admin.users.create'])}} ">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.users.index')}}"
                               class ="{{setActiveRoute('admin.users.index')}}">
                                <i class="nav-icon fas fa-eye"></i>
                                <p>All Users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.users.create')}}"
                               class ="{{setActiveRoute('admin.users.create')}}">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Create New User</p>
                            </a>
                        </li>
                    </ul>
                </li>


{{--                <li class="nav-item">--}}
{{--                    <a href="#" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Simple Link--}}
{{--                            <span class="right badge badge-danger">New</span>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
