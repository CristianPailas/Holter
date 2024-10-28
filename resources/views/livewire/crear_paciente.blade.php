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

            <button type="submit" class="btn btn-primary mt-3">Guardar Paciente</button>
        </form>
    </div>
</div>
