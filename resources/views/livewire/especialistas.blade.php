<div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('especialistaCreado', (event) => {
            let data = event.detail;
            console.log(data);
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.type,
                confirmButtonText: 'Ok'
            })
        }),
        document.addEventListener('especialistaEliminado', (event) => {
            let data = event.detail;
            console.log(data);
            Swal.fire({
                title: data.title,
                text: data.text,
                icon: data.type,
                confirmButtonText: 'Ok'
            })
        })
    </script>

    @if ($modal)
        {{-- MODAL --}}
        <div class="modal-backdrop fade show"></div>
        <div class="modal fade show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-modal="true" style="display: block; padding-left: 0px;">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div>
                        <div class="container d-flex justify-content-center align-items-center"
                            style="min-height: 100vh;">
                            <div class="card p-4" style="width: 100%; max-width: 1000px;">
                                <h1 class="text-center mb-4">{{ $estadoModal }}</h1>

                                <form wire:submit.prevent="crearEspecialistas">
                                    <div class="form-group">
                                        <label>Nombres</label>
                                        <input type="text" wire:model="nombre" class="form-control">
                                        @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Apellidos</label>
                                        <input type="text" wire:model="apellidos" class="form-control">
                                        @error('apellidos') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>correo</label>
                                        <input type="email" wire:model="correo" class="form-control">
                                        @error('correo') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Contraseña</label>
                                        <input type="text" wire:model="contrasena" class="form-control">
                                        @error('contrasena') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Número de Identificación</label>
                                        <input type="text" wire:model="identification" class="form-control">
                                        @error('identification') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Especialidad</label>
                                        <input type="text" wire:model="especialidad" class="form-control">
                                        @error('especialidad') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Años de Experiencia</label>
                                        <input type="number" wire:model="experiencia" class="form-control">
                                        @error('experiencia') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Información de Contacto</label>
                                        <input type="number" wire:model="contacto" class="form-control">
                                        @error('contacto') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn bg-gradient-secondary" wire:click="cerrar()"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <button type="submit" class="btn btn-primary mt-3">Guardar Especialista</button>
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

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Listado de Especialistas</h5>
                        </div>
                        <button type="button" class="btn bg-gradient-primary" wire:click="creacion">
                            Agregar nuevo especialista
                        </button>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Nombre
                            </th>
                            <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            apellidos
                        </th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                correo
                            </th>
                            <th
                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Especialidad
                            </th>
                            <th
                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                            experiencia
                        </th>
                        <th
                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                        Contacto
                    </th>
                    <th
                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Acciones
                </th>
                
                            </thead>
                            <tbody>
                                @foreach ($listadoEspecialistas as $especialista)
                                    <tr>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $especialista->nombre }}</p>
                                        </td> 
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $especialista->apellidos }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $especialista->correo }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $especialista->especialidad }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $especialista->experiencia }}</p>
                                        </td>
                                        <td class="text-center">
                                            <p class="text-xs font-weight-bold mb-0">{{ $especialista->contacto }}</p>
                                        </td>
                                       
                                        <td class="text-center">
                                            <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                data-bs-original-title="Editar"
                                                wire:click="editar({{ $especialista->id }})">
                                                <i class="fas fa-user-edit text-secondary"></i>
                                            </a>
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary"
                                                    wire:click="confirmarEliminar({{ $especialista->id }})"
                                                    data-bs-original-title="Eliminar"></i>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach

                                @if ($modalDelete)
                                    <div class="modal fade show" id="exampleModalLive" tabindex="-1"
                                        aria-labelledby="exampleModalLiveLabel" style="display: block;"
                                        aria-modal="true" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLiveLabel">Eliminar especialista:
                                                        <b class="text-danger">{{ $especialistaEliminar->nombre }}</b>
                                                    </h5>
                                                </div>
                                                <div class="modal-body">
                                                    <p>¿Está seguro de eliminar este especialista? Esta operación <b>NO</b>
                                                        se puede deshacer!</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        wire:click="cerrar"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button"
                                                        wire:click="eliminar({{ $especialistaEliminar->id }})"
                                                        class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-backdrop fade show"></div>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
