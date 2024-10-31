<div>

  <script>
      document.addEventListener('PacienteCreado', (event) => {
              let data = event.detail;
              console.log(data);
              Swal.fire({
                  title: data.title,
                  text: data.text,
                  icon: data.type,
                  confirmButtonText: 'Ok'
              })
          }),
          document.addEventListener('PacienteEliminado', (event) => {
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

                              <form wire:submit.prevent="crearPaciente">
                                  <div class="form-group">
                                      <label>Nombre</label>
                                      <input type="text" wire:model="nombres" class="form-control">
                                      @error('nombres')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label>Apellidos</label>
                                      <input type="text" wire:model="apellidos" class="form-control">
                                      @error('apellidos')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>

                                  <div class="form-group">
                                      <label>Número de Identificación</label>
                                      <input type="number" wire:model="identificacion" class="form-control">
                                      @error('identificacion')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>

                                  <div class="form-group">
                                      <label>Edad</label>
                                      <input type="number" wire:model="edad" class="form-control">
                                      @error('edad')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>

                                  <div class="form-group">
                                      <label>Sexo</label>
                                      <select wire:model="sexo" class="form-control">
                                          <option value="">Seleccione</option>
                                          <option value="Masculino">Masculino</option>
                                          <option value="Femenino">Femenino</option>
                                          <option value="Otro">Otro</option>
                                      </select>
                                      @error('sexo')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>

                                  <div class="form-group">
                                      <label>Dirección</label>
                                      <input type="text" wire:model="direccion" class="form-control"
                                          placeholder="Opcional">
                                      @error('direccion')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                      <label>fecha de nacimiento</label>
                                      <input type="date" wire:model="fecha_nacimiento" class="form-control">
                                      @error('fecha_nacimiento')
                                          <span class="text-danger">{{ $message }}</span>
                                      @enderror
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn bg-gradient-secondary" wire:click="cerrar()"
                                          data-bs-dismiss="modal">Cerrar</button>
                                      <button type="submit" class="btn btn-primary mt-3">Guardar Paciente</button>

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

  <body class="g-sidenav-show  bg-gray-100">
      @include('components.layouts.navbars.admin.aside')
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
                        <input type="text" class="form-control" placeholder="Buscar paciente...">
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
                              <h5 class="mb-0">Pacientes</h5>
                             
                          </div>
                          <button type="button" class="btn bg-gradient-primary" wire:click="creacion">
                              Agregar nuevo paciente
                          </button>
                      </div>
                  </div>
                 
                  <div class="card-body px-0 pb-2 ">
                    <div class="table-responsive">
                      <table class="table align-items-center mb-0">
                          <thead>
                              <tr>

                                  <th
                                      class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                      Foto
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Nombre
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Apellidos
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Género
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Fecha de nacimiento
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Edad
                                  </th>
                                  <th
                                      class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Acciones
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($listadoPacientes as $paciente)
                                  <tr>

                                      <td>
                                          <div>
                                              <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                          </div>
                                      </td>
                                      <td class="text-center">
                                          <p class="text-xs font-weight-bold mb-0">{{ $paciente->nombres }}</p>
                                      </td>
                                      <td class="text-center">
                                          <p class="text-xs font-weight-bold mb-0">{{ $paciente->apellidos }}</p>
                                      </td>
                                      <td class="text-center">
                                          <p class="text-xs font-weight-bold mb-0">{{ $paciente->genero }}</p>
                                      </td>
                                      <td class="text-center">
                                          <span
                                              class="text-secondary text-xs font-weight-bold">{{ $paciente->fecha_nacimiento }}</span>
                                      </td>
                                      <td class="text-center">
                                          <span
                                              class="text-secondary text-xs font-weight-bold">{{ $paciente->fecha_nacimiento }}</span>
                                      </td>
                                      <td class="text-center">
                                          <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                              data-bs-original-title="Editar"
                                              wire:click="editar({{ $paciente->id }})">
                                              <i class="fas fa-user-edit text-secondary"></i>
                                          </a>
                                          <span>
                                              <i class="cursor-pointer fas fa-trash text-secondary"
                                                  wire:click="confirmarEliminar({{ $paciente->id }})"
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
                                                  <h5 class="modal-title" id="exampleModalLiveLabel">Eliminar
                                                      producto: <b class="text-danger">
                                                          {{ $pacienteEliminar->nombres }}</b></h5>


                                              </div>
                                              <div class="modal-body">
                                                  <p>¿Está seguro de eliminar este paciente? esta operación
                                                      <b>NO</b>
                                                      se puede
                                                      deshacer! </p>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary"
                                                      wire:click="cerrar" data-bs-dismiss="modal">Close</button>
                                                  <button type="button"
                                                      wire:click="eliminar({{ $pacienteEliminar->id }})"
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
        </main>
     
  </body>
</div>
