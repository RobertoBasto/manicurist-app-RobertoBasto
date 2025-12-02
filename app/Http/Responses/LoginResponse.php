<?php
namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */

public function toResponse($request)
{
    $user = request()->user();

    if ($user->hasRole('Admin')) {
        return redirect()->intended(route('admin.dashboard'));
    }

 
    if ($user->hasRole('Client')) {
        // Puedes mandarlo al mismo panel de admin o a uno especial para empleados
        return redirect()->intended(route('client.dashboard')); 
    }
    return redirect()->intended('/dashboard'); 
}
}