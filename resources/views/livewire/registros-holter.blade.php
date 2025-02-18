<div>
    <script>
        document.addEventListener('SweetAlertVista', (event) => {
            let data = event.detail;
            console.log(data);
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.type,
                confirmButtonText: 'Ok'
            });
        });
    </script>

    <div>
        <!-- StartModal -->
        <!-- EndModal -->

        <body class="g-sidenav-show bg-gray-100">
            @include('components.layouts.navbars.user.aside')
            <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
                    <div class="container-fluid py-1 px-3">

                        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

                            </div>
                            <ul class="navbar-nav justify-content-end">
                                <li class="nav-item d-flex align-items-center">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" placeholder="Buscar proceso...">
                                    </div>
                                </li>
                                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                        <div class="sidenav-toggler-inner">
                                            <i class="sidenav-toggler-line">z</i>
                                            <i class="sidenav-toggler-line">x</i>
                                            <i class="sidenav-toggler-line">y</i>
                                        </div>
                                    </a>
                                </li>
                                {{-- NOTIFICACIONES  --}}
                                <li class="nav-item mx-3 dropdown pe-2 d-flex align-items-center">
                                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-bell cursor-pointer"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                                        <li class="mb-2">
                                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                                <div class="d-flex py-1">
                                                    <div class="my-auto">
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3 ">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-4 mx-4">
                                <div class="card-header pb-0">
                                    <div class="d-flex flex-row justify-content-between">
                                        <div>
                                            <h2 class="mb-0">Registros Holter No. 000{{$procedimiento_id}}</h2>
                                        </div>
                                        <button type="button" wire:click="NuevoProcedimiento" class="btn bg-gradient-primary">
                                            Nuevo Registro
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body px-0 pt-0 pb-2">
                                    <div class="table-responsive p-0">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        ID
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Hora
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        FC Min
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        FC Max
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        FC Medio
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Total Latidos
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Eventos Ventriculares
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Eventos Supraventriculares
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($registros as $reg)
                                                <tr>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->id }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->hora }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->fc_min }} - {{ $reg->hora_fc_min }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->fc_max }} - {{ $reg->hora_fc_max }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->fc_medio }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->total_latidos }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->vent_total}}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $reg->supr_total}}</p>
                                                    </td>

                                                    <td class="text-center">
                                                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Editar"
                                                            wire:click="editar({{ $reg->id }})"
                                                            title="Row: {{$reg->id}}">
                                                            <i class="fas fa-user-edit text-secondary"></i>
                                                        </a>
                                                        <span>
                                                            <i class="cursor-pointer fas fa-trash text-danger"
                                                                wire:click="confirmarEliminar({{ $reg->id }})"
                                                                data-bs-original-title="Eliminar"></i>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- Modal para confirmar eliminación --}}
                                        {{-- @if ($modalDelete)
                                            <div class="modal fade show" id="exampleModalLive" tabindex="-1"
                                                aria-labelledby="exampleModalLiveLabel" style="display: block;"
                                                aria-modal="true" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLiveLabel">Eliminar
                                                                procedimiento:
                                                                <b class="text-danger">{{ $procedimientoEliminar->id }}</b>
                                        </h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>¿Está seguro de eliminar este procedimiento? Esta operación
                                            <b>NO</b>
                                            se puede deshacer!
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            wire:click="cerrar" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button"
                                            wire:click="eliminar({{ $procedimientoEliminar->id }})"
                                            class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-backdrop fade show"></div>
                        @endif

                    </div> --}}
                </div>
    </div>
</div>
</div>
</div>
</main>
</body>
</div>
</div>