<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


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
    ]);

    // 2. Crear usuario
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'phone' => $request->phone,
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
    if ($user->id <= 3) {
        session()->flash('swal', [
            'icon' => 'error',
            'title' => 'Error',
            'text' => 'No puedes editar este usuario',
        ]);
        return redirect()->route('admin.users.index');
    }

    // ⭐ OBTENER ROLES PARA EL SELECT
    $roles = Role::pluck('name', 'name');

    return view('admin.users.edit', compact('user', 'roles'));
}


    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'phone' => 'required|string',
    ]);

    // Si envía password, actualizar, si no, conservar
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
    ];

    if ($request->password) {
        $data['password'] = bcrypt($request->password);
    }

    $user->update($data);



    session()->flash('swal', [
        'icon' => 'success',
        'title' => 'Usuario actualizado',
        'text' => 'Los cambios se guardaron correctamente',
    ]);

    return redirect()->route('admin.users.index');
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