<x-admin-layout :breadcrumbs="[
    ['name'=>'Dashboard','href'=> route('admin.dashboard')],
    ['name' => 'Users','href'=> route('admin.users.index')],
    ['name'=>'Editar'],
]">

<x-wire-card>
    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <x-wire-input 
            label="Nombre" 
            name="name" 
            placeholder="Nombre de usuario" 
            value="{{ old('name', $user->name) }}"
        />

        <!-- Email -->
        <x-wire-input 
            label="Email" 
            name="email" 
            type="email"
            placeholder="Correo electrónico" 
            value="{{ old('email', $user->email) }}"
        />

        <!-- Teléfono -->
        <x-wire-input 
            label="Teléfono" 
            name="phone"
            placeholder="Número telefónico" 
            value="{{ old('phone', $user->phone) }}"
        />

        <!-- Contraseña (opcional) -->
        <x-wire-input 
            label="Contraseña (solo si deseas cambiarla)" 
            name="password" 
            type="password"
            placeholder="Nueva contraseña"
        />

        <div class="flex justify-end mt-4">
            <x-wire-button type="submit" blue>Actualizar</x-wire-button>
        </div>
    </form>
</x-wire-card>

</x-admin-layout>
