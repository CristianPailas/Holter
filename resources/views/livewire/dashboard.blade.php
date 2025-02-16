<div>

    <body class="g-sidenav-show  bg-gray-100">
        @if($role=== 'admin')
        @include('components.layouts.navbars.admin.aside')
        @endif
        @if($role=== 'user')
        @include('components.layouts.navbars.user.aside')
        @endif
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">

                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                        </div>
                        <ul class="navbar-nav  justify-content-end">
                            <li class="nav-item d-flex align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Buscar dispositivo...">
                                </div>
                            </li>
                            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                        <i class="sidenav-toggler-line"></i>
                                    </div>
                                </a>
                            </li>
                            {{-- NOTIFICACIONES  --}}
                            <li class="nav-item mx-3 dropdown pe-2 d-flex align-items-center">
                                <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-bell cursor-pointer"></i>
                                </a>
                                <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                    aria-labelledby="dropdownMenuButton">
                                    <li class="mb-2">
                                        <a class="dropdown-item border-radius-md" href="javascript:;">
                                            <div class="d-flex py-1">
                                                <div class="my-auto">
                                                    <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="text-sm font-weight-normal mb-1">
                                                        <span class="font-weight-bold">New message</span> from Laur
                                                    </h6>
                                                    <p class="text-xs text-secondary mb-0 ">
                                                        <i class="fa fa-clock me-1"></i>
                                                        13 minutes ago
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    {{-- FIN NOTIFICACIONES  --}}

                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- End Navbar -->
            <div class="container-fluid py-4">

                <div class="row my-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header pb-0">
                                <div class="d-flex flex-row justify-content-between">
                                    <div>
                                        <h5 class="mb-0">Dashboard</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body px-0 pt-0 pb-2">

                                <div class="container-fluid py-4">
                                    <div class="row my-4">
                                        <div class="col-12">
                                            <div class="row">

                                                <!-- Card Admin: Costos -->
                                                @if($role=== 'admin')
                                                <!-- Card Admin: Pacientes -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <a href="{{ route('pacientes') }}">
                                                                <i class="fas fa-user-md fa-3x mb-3"></i>
                                                                <h5 class="card-title">Pacientes</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card Admin: Especialistas -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <a href="{{ route('especialistas') }}">
                                                                <i class="fas fa-user-nurse fa-3x mb-3"></i>
                                                                <h5 class="card-title">Especialistas</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Card Admin: Dispositivos -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <a href="{{ route('dispositivos') }}">
                                                                <i class="fas fa-laptop-medical fa-3x mb-3"></i>
                                                                <h5 class="card-title">Dispositivos</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($role=== 'user')
                                                <!-- Card Admin/User: Procedimientos -->
                                                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                                                    <div class="card">
                                                        <div class="card-body text-center">
                                                            <a href="{{ route('procedimientos') }}">
                                                                <i class="fas fa-procedures fa-3x mb-3"></i>
                                                                <h5 class="card-title">Procedimientos</h5>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
        </main>

    </body>
</div>

</div>
