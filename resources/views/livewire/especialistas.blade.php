<div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title font-weight-normal" id="exampleModalLabel">Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                <div class="card p-4" style="width: 500%; max-width: 1000px;">
                    <h1 class="text-center mb-4">Crear Nuevo Paciente</h1>
            
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
            
                    <form wire:submit.prevent="submit">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" wire:model="name" class="form-control">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="form-group">
                            <label>Número de Identificación</label>
                            <input type="text" wire:model="identification_no" class="form-control">
                            @error('identification_no') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="form-group">
                            <label>Edad</label>
                            <input type="number" wire:model="age" class="form-control">
                            @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="form-group">
                            <label>Sexo</label>
                            <select wire:model="sex" class="form-control">
                                <option value="">Seleccione</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Otro">Otro</option>
                            </select>
                            @error('sex') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="form-group">
                            <label>Diagnóstico</label>
                            <input type="text" wire:model="diagnosis" class="form-control" placeholder="Opcional">
                            @error('diagnosis') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
            
                        <div class="form-group">
                            <label>Indicación</label>
                            <textarea wire:model="indication" class="form-control" placeholder="Opcional"></textarea>
                            @error('indication') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
            
                        
                    </form>
                </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn bg-gradient-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
          <div class="card mb-4 mx-4">
              <div class="card-header pb-0">
                  <div class="d-flex flex-row justify-content-between">
                      <div>
                          <h5 class="mb-0">All Users</h5>
                      </div>
                      <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Agregar Nuevo Paciente
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
                                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                      Photo
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Name
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Email
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      role
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Creation Date
                                  </th>
                                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr>
                                  <td class="ps-4">
                                      <p class="text-xs font-weight-bold mb-0">1</p>
                                  </td>
                                  <td>
                                      <div>
                                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                      </div>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Admin</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">admin@softui.com</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Admin</p>
                                  </td>
                                  <td class="text-center">
                                      <span class="text-secondary text-xs font-weight-bold">16/06/18</span>
                                  </td>
                                  <td class="text-center">
                                      <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                          data-bs-original-title="Edit user">
                                          <i class="fas fa-user-edit text-secondary"></i>
                                      </a>
                                      <span>
                                          <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                      </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="ps-4">
                                      <p class="text-xs font-weight-bold mb-0">2</p>
                                  </td>
                                  <td>
                                      <div>
                                          <img src="/assets/img/team-1.jpg" class="avatar avatar-sm me-3">
                                      </div>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Creator</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">creator@softui.com</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Creator</p>
                                  </td>
                                  <td class="text-center">
                                      <span class="text-secondary text-xs font-weight-bold">05/05/20</span>
                                  </td>
                                  <td class="text-center">
                                      <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                          data-bs-original-title="Edit user">
                                          <i class="fas fa-user-edit text-secondary"></i>
                                      </a>
                                      <span>
                                          <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                      </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="ps-4">
                                      <p class="text-xs font-weight-bold mb-0">3</p>
                                  </td>
                                  <td>
                                      <div>
                                          <img src="/assets/img/team-3.jpg" class="avatar avatar-sm me-3">
                                      </div>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Member</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">member@softui.com</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Member</p>
                                  </td>
                                  <td class="text-center">
                                      <span class="text-secondary text-xs font-weight-bold">23/06/20</span>
                                  </td>
                                  <td class="text-center">
                                      <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                          data-bs-original-title="Edit user">
                                          <i class="fas fa-user-edit text-secondary"></i>
                                      </a>
                                      <span>
                                          <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                      </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="ps-4">
                                      <p class="text-xs font-weight-bold mb-0">4</p>
                                  </td>
                                  <td>
                                      <div>
                                          <img src="/assets/img/team-4.jpg" class="avatar avatar-sm me-3">
                                      </div>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Peterson</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">peterson@softui.com</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Member</p>
                                  </td>
                                  <td class="text-center">
                                      <span class="text-secondary text-xs font-weight-bold">26/10/17</span>
                                  </td>
                                  <td class="text-center">
                                      <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                          data-bs-original-title="Edit user">
                                          <i class="fas fa-user-edit text-secondary"></i>
                                      </a>
                                      <span>
                                          <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                      </span>
                                  </td>
                              </tr>
                              <tr>
                                  <td class="ps-4">
                                      <p class="text-xs font-weight-bold mb-0">5</p>
                                  </td>
                                  <td>
                                      <div>
                                          <img src="/assets/img/marie.jpg" class="avatar avatar-sm me-3">
                                      </div>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Marie</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">marie@softui.com</p>
                                  </td>
                                  <td class="text-center">
                                      <p class="text-xs font-weight-bold mb-0">Creator</p>
                                  </td>
                                  <td class="text-center">
                                      <span class="text-secondary text-xs font-weight-bold">23/01/21</span>
                                  </td>
                                  <td class="text-center">
                                      <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                          data-bs-original-title="Edit user">
                                          <i class="fas fa-user-edit text-secondary"></i>
                                      </a>
                                      <span>
                                          <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                      </span>
                                  </td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  