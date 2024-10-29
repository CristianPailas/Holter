<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
        })
    </script>
    <div class="card p-4" style="width: 500%; max-width: 1000px;">
        <h1 class="text-center mb-4">Crear Nuevo Paciente</h1>

        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

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
                <input type="text" wire:model="direccion" class="form-control" placeholder="Opcional">
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


            <button type="submit" class="btn btn-primary mt-3">Guardar Paciente</button>
        </form>
    </div>
</div>
