<div>
    <script>
        document.addEventListener('ProcedimientoCreado', (event) => {
            let data = event.detail;
            console.log(data);
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.type,
                confirmButtonText: 'Ok'
            });
        });

        document.addEventListener('ProcedimientoEliminado', (event) => {
            let data = event.detail;
            console.log(data);
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.type,
                confirmButtonText: 'Ok'
            });
        });

        document.addEventListener('ProcedimientoError', (event) => {
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
        @if ($modal)
        {{-- MODAL --}}
        <div class="modal-backdrop fade show"></div>
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-modal="true" style="display: block; padding-left: 0px;">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <div class="container d-flex justify-content-center align-items-center"
                            style="min-height: 100vh;">
                            <div class="card p-4" style="width: 500%; max-width: 1000px;">
                                <h1 class="text-center mb-4">Nuevo Procedimiento</h1>

                                <form wire:submit.prevent="crearProcedimiento">
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha Inicio</label>
                                                <input type="datetime-local" wire:model="fecha_ini" class="form-control">
                                                @error('fecha_ini')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Fecha Final</label>
                                                <input type="datetime-local" wire:model="fecha_fin" class="form-control">
                                                @error('fecha_fin')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Duracion (horas)</label>
                                                <input type="text" wire:model="duracion" class="form-control">
                                                @error('duracion')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Edad (años)</label>
                                                <input type="number" wire:model="edad" class="form-control">
                                                @error('edad')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Paciente</label>
                                        <select class="form-control" wire:model="paciente_id" name="choices-button" id="choices-button" wire:change="datosSeleccion($event.target.value,'pacientes')">
                                            <option value="0" selected="">Seleccione un paciente</option>
                                            @foreach ($listaPacientes as $paciente)
                                            <option value="{{ $paciente->id }}">{{ $paciente->nombres }} {{ $paciente->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Especialista</label>
                                        <select class="form-control" wire:model="especialista_id" name="choices-button" id="choices-button" wire:change="datosSeleccion($event.target.value,'especialistas')">
                                            <option value="0" selected="">Seleccione un especialista</option>
                                            @foreach ($listaEspecialistas as $esp)
                                            <option value="{{ $esp->id }}">{{ $esp->nombres }} {{ $esp->apellidos }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Dispositivo</label>
                                                <select class="form-control" wire:model="dispositivo_id" name="choices-button" id="choices-button" wire:change="datosSeleccion($event.target.value,'dispositivos')">
                                                    <option value="0" selected="">Seleccione un dispositivo</option>
                                                    @foreach ($listaDispositivos as $disp)
                                                    <option value="{{ $disp->id }}">{{ $disp->numero_serie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Estado</label>
                                                <select class="form-control" wire:model="estado_proc" name="choices-button" id="choices-button">
                                                    <option value="0" selected="">Seleccione...</option>
                                                    <option value="ABIERTO">ABIERTO</option>
                                                    <option value="CERRADO">CERRADO</option>
                                                    <option value="CANCELADO">CANCELADO</option>
                                                </select>
                                                @error('estado_proc')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Observaciones</label>
                                        <textarea class="form-control" wire:model="observaciones" cols="80" rows="3"></textarea>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary" wire:click="cerrar()" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {{-- MODAL --}}
        @endif

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
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
                                            <i class="sidenav-toggler-line"></i>
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
                                            <h5 class="mb-0">Procedimientos</h5>
                                        </div>
                                        <button type="button" wire:click="NuevoProcedimiento" class="btn bg-gradient-primary">
                                            Nuevo Procedimiento
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
                                                        Paciente
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Edad
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Fecha Inicial
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Fecha Final
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Dispositivo
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Estado
                                                    </th>
                                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listadoProcedimientos as $procedimiento)
                                                <tr>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $procedimiento->id }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $procedimiento->identificacion }} - {{ $procedimiento->nombres }} {{ $procedimiento->apellidos }} </p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $procedimiento->edad }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $procedimiento->fecha_ini }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $procedimiento->fecha_fin }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <p class="text-xs font-weight-bold mb-0">{{ $procedimiento->numero_serie }}</p>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="badge
                                                            @if($procedimiento->estado_proc == 'ABIERTO') bg-warning text-dark
                                                            @elseif($procedimiento->estado_proc == 'CERRADO') bg-success
                                                            @elseif($procedimiento->estado_proc == 'CANCELADO') bg-danger
                                                            @endif">
                                                            {{ $procedimiento->estado_proc }}
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                            data-bs-original-title="Editar"
                                                            wire:click="editar({{ $procedimiento->id }})"
                                                            title="Row: {{$procedimiento->id}}">
                                                            <i class="fas fa-user-edit text-secondary"></i>
                                                        </a>
                                                        <span>
                                                            <i class="cursor-pointer fas fa-trash text-secondary"
                                                                wire:click="confirmarEliminar({{ $procedimiento->id }})"
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
