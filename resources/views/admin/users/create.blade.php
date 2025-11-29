<x-admin-layout :breadcrumbs="[
    [
        'name'=>'Dashboard',
        'href'=> route('admin.dashboard'),
    ],
    [
        'name' => 'User',
        'href'=> route('admin.users.index'),
    ],
    ['name'=>'Nuevo'],
]">

<x-wire-card>
    <form action="{{route('admin.users.store')}}" method="POST">
        @csrf

        {{-- Nombre --}}
        <x-wire-input 
            label="Nombre"
            name="name"
            placeholder="Nombre del usuario"
            value="{{ old('name') }}">
        </x-wire-input>

        {{-- Email --}}
        <x-wire-input 
            label="Email"
            name="email"
            type="email"
            placeholder="correo@ejemplo.com"
            value="{{ old('email') }}">
        </x-wire-input>

        {{-- Password --}}
        <x-wire-input 
            label="Contraseña"
            name="password"
            type="password"
            placeholder="********">
        </x-wire-input>

        {{-- Phone --}}
        <x-wire-input 
            label="Teléfono"
            name="phone"
            placeholder="5551234567"
            value="{{ old('phone') }}">
        </x-wire-input>

        {{-- Dirección --}}
        <x-wire-input 
            label="Dirección"
            name="address"
            placeholder="Dirección del usuario"
            value="{{ old('address') }}">
        </x-wire-input>

        <div class="flex justify-end mt-4">
            <x-wire-button type="submit" blue>Guardar</x-wire-button>
        </div>
    </form>
</x-wire-card>

</x-admin-layout>

