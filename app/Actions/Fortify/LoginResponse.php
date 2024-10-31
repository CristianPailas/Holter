<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        // Redirigir según el rol del usuario
        if ($request->user()->role === 'admin') {
            return redirect()->route('pacientes');
        }
        if ($request->user()->role === 'user') {
            return redirect()->route('procedimientos');
        }
        
        return redirect()->route('login');
    }
}
