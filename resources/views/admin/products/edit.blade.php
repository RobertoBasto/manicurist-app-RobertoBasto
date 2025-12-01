<x-admin-layout :breadcrumbs="[
    ['name'=>'Dashboard','href'=> route('admin.dashboard')],
    ['name' => 'Products','href'=> route('admin.products.index')],
    ['name'=>'Editar'],
]">

<x-wire-card>
    <form action="{{ route('admin.products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nombre -->
        <x-wire-input 
            label="Nombre" 
            name="name" 
            placeholder="Nombre del producto" 
            value="{{ old('name', $product->name) }}"
        />

        <!-- Marca -->
        <x-wire-input 
            label="Marca" 
            name="brand" 
            placeholder="Marca del producto" 
            value="{{ old('brand', $product->brand) }}"
        />

        <!-- Precio -->
        <x-wire-input 
            label="Precio" 
            name="price"
            placeholder="Precio sin signo" 
            value="{{ old('price', $product->price) }}"
        />

        <div class="flex justify-end mt-4">
            <x-wire-button type="submit" blue>Actualizar</x-wire-button>
        </div>
    </form>
</x-wire-card>

</x-admin-layout>