<x-admin-layout :breadcrumbs="[
    [
        'name'=>'Dashboard',
        'href'=> route('admin.dashboard'),
    ],
    [
        'name' => 'Product',
        'href'=> route('admin.products.index'),
    ],
    ['name'=>'Nuevo'],
]">

<x-wire-card>
    <form action="{{route('admin.products.store')}}" method="POST">
        @csrf

        {{-- Nombre --}}
        <x-wire-input 
            label="Nombre"
            name="name"
            placeholder="Nombre del producto"
            value="{{ old('name') }}">
        </x-wire-input>

        {{-- Marca --}}
        <x-wire-input 
            label="Marca"
            name="brand"
            placeholder="Marca del producto"
            value="{{ old('brand') }}">
        </x-wire-input>

        {{-- Precio --}}
        <x-wire-input 
            label="Precio"
            name="price"
            placeholder="numero sin signo"
            value="{{ old('price') }}">
        </x-wire-input>

        <div class="flex justify-end mt-4">
            <x-wire-button type="submit" blue>Guardar</x-wire-button>
        </div>
    </form>
</x-wire-card>

</x-admin-layout>