<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">BGL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Adminbek</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{url('/')}}"
                       class="nav-link @if(request()->routeIs('statistic.index')) active @endif ">
                        <i class="fa fa-users nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu">
                    <a href="#"
                       class="nav-link  @if(request()->routeIs('worker.index')
                                            or request()->routeIs('work.index')
                                            or request()->routeIs('type.index'))
                                        active @endif">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>
                            Sozlamalar
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('worker.index')}}"
                               class="nav-link @if(request()->routeIs('worker.index')) active @endif">
                                <i class="fa fa-users nav-icon"></i>
                                <p>Ishchilar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('work.index')}}"
                               class="nav-link @if(request()->routeIs('work.index')) active @endif">
                                <i class="fa fa-tasks nav-icon"></i>
                                <p>Ish turi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('type.index')}}" class="nav-link @if(request()->routeIs('type.index')) active @endif">
                                <i class="fa fa-box nav-icon"></i>
                                <p>Tur</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item menu-open">

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('firms.index')}}"
                               class="nav-link @if(request()->routeIs('firms.index')) active @endif">
                                <i class="fa fa-building nav-icon"></i>
                                <p>Firmalar</p>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('products.index')}}" class="nav-link">
                                <i class="fa fa-spa nav-icon"></i>
                                <p>Mahsulot</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('sells.index')}}" class="nav-link @if(request()->routeIs('sells.index')) active @endif ">
                                <i class="fa fa-weight-hanging nav-icon"></i>
                                <p>Sotish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('outlay.index')}}"
                               class="nav-link @if(request()->routeIs('outlay.index')) active @endif">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Chiqimlar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('warehouses.index')}}"
                               class="nav-link @if(request()->routeIs('warehouses.index')) active @endif">
                                <i class="fa fa-warehouse nav-icon"></i>
                                <p>Sklad</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('finished_products.index')}}"
                               class="nav-link @if(request()->routeIs('finished_products.index')) active @endif">
{{--                                <i class="fa fa-list-alt nav-icon"></i>--}}
                                <i class="fa fa-sharp fa-check nav-icon" ></i>
                                <p>Tayyor mahsulot</p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('gaz.index')}}"
                               class="nav-link @if(request()->routeIs('gaz.index')) active @endif">
                                <i class="fa fa-fire-alt nav-icon"></i>
                                <p>Gaz</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('electric_current.index')}}"
                               class="nav-link @if(request()->routeIs('electric_current.index')) active @endif">
                                <i class="fa fa-bolt  nav-icon"></i>
                                <p>Elektr energiyasi</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                @csrf
{{--                                <button type="submit" class="btn btn-danger btn-block">Chiqish</button>--}}
                            </form>
                            <a onclick="document.getElementById('logout-form').submit();"
                               class="nav-link cursor-pointer">
                                <i class="fa fa-door-open  nav-icon"></i>
                                <p>Chiqish</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
