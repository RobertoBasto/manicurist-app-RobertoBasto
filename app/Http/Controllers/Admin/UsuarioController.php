<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

   public function store(Request $request)
{
    // 1. Validación
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
    ]);

    // 2. Crear usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'id_number' => rand(100000000, 999999999),
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
        'address' => $request->address,
    ]);

    // 3. Si vas a asignar rol (opcional)
    if ($request->has('role')) {
        $user->assignRole($request->role);
    }

    // 4. Redirección
    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Usuario creado correctamente.');
}


    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
            if($user->id <=3) {
    //variable de un solo uso
     session()->flash('swal', 
     [
    'icon' => 'error',
    'title' => 'Error',
    'text' => 'No puedes editar este usuario',
    ]);
    return redirect()->route('admin.users.index');
    }
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, User $user)
    {
        //
    }

    public function destroy(User $user)
     {
        //restringir la accion para los primeros 4 roles fijos
         if($user->id <=3) {
    //variable de un solo uso
     session()->flash('swal', 
     [
    'icon' => 'error',
    'title' => 'Error',
    'text' => 'No puedes eliminar este usuario',
    ]);
    return redirect()->route('admin.users.index', $user);
    }
        //Borra el elemento
        $user->delete();
        //Alerta
        session()->flash('swal', 
    [
    'icon' => 'success',
    'title' => 'Usuario eliminado correctamente',
    'text' => 'El Usuario ha sido eliminado exitosamente',
    ]);
    //redireccionar al mismo lugar
    return redirect()->route('admin.users.index');
    }
}