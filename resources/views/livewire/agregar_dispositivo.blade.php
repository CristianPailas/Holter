<div>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-4" style="width: 100%; max-width: 1000px;">
            <h1 class="text-center mb-4">Registrar Nuevo Dispositivo Holter</h1>
    
            @if (session()->has('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
    
            <form wire:submit.prevent="submit">
                <!-- Número de Serie -->
                <div class="form-group">
                    <label>Número de Serie</label>
                    <input type="text" wire:model="serial_number" class="form-control">
                    @error('serial_number') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Modelo -->
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" wire:model="model" class="form-control">
                    @error('model') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Fecha de Adquisición -->
                <div class="form-group">
                    <label>Fecha de Adquisición</label>
                    <input type="date" wire:model="acquisition_date" class="form-control">
                    @error('acquisition_date') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Estado -->
                <div class="form-group">
                    <label>Estado</label>
                    <select wire:model="status" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="operativo">Operativo</option>
                        <option value="fuera de servicio">Fuera de Servicio</option>
                        <option value="en reparación">En Reparación</option>
                    </select>
                    @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <!-- Disponibilidad -->
                <div class="form-group">
                    <label>Disponibilidad</label>
                    <select wire:model="availability" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    </select>
                    @error('availability') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
    
                <button type="submit" class="btn btn-primary mt-3">Guardar Dispositivo</button>
            </form>
        </div>
    </div>
    
</div>
