<div>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 1000px;">
            <h1 class="text-center mb-4">Crear Nuevo Especialista</h1>
    
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
    
            <form wire:submit.prevent="submit">
                <!-- Nombre -->
                <div class="form-group">
                    <label>Nombres</label>
                    <input type="text" wire:model="nombre" class="form-control">
                    @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" wire:model="gmail" class="form-control">
                    @error('gmail') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Número de Identificación -->
                <div class="form-group">
                    <label>Número de Identificación</label>
                    <input type="text" wire:model="identification" class="form-control">
                    @error('identification') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="text" wire:model="Contraseña" class="form-control">
                    @error('Contraseña') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Especialidad -->
                <div class="form-group">
                    <label>Especialidad</label>
                    <input type="text" wire:model="especialidad" class="form-control">
                    @error('Especialidad') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Años de Experiencia -->
                <div class="form-group">
                    <label>Años de Experiencia</label>
                    <input type="number" wire:model="experiencia" class="form-control">
                    @error('experience_years') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Información de Contacto -->
                <div class="form-group">
                    <label>Información de Contacto</label>
                    <input type="text" wire:model="Contacto" class="form-control">
                    @error('experiencia') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <button type="submit" class="btn btn-primary mt-3">Guardar Especialista</button>
            </form>
        </div>
    </div>
    
</div>
