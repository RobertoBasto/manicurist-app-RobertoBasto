
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Cliente</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    {{-- NAV --}}
    @include('layouts.client.navigation')

    <div class="flex">

        {{-- SIDEBAR DEL CLIENTE --}}
        <aside class="w-64 bg-white shadow h-screen p-4">

            <h2 class="font-bold text-lg mb-4">Menú Cliente</h2>

            <ul class="space-y-2">

                {{-- Solo Productos (SIN opciones de CRUD) --}}
                <li>
                    <a href="{{ route('client.dashboard') }}" 
                       class="block py-2 px-3 rounded hover:bg-gray-200">
                        Dashboard
                    </a>
                </li>

                {{-- Puedes agregar más módulos para cliente aquí --}}

            </ul>
        </aside>

        {{-- CONTENIDO --}}
        <main class="p-6 w-full">

            {{-- Breadcrumb del cliente --}}
            @include('layouts.client.breadcrumb')

            {{-- Contenido dinámico --}}
            {{ $slot }}

        </main>

    </div>

</body>
</html>
