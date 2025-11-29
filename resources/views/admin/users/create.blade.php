<x-admin-layout :breadcrumbs="[
    [
        'name'=>'Dashboard',
        'href'=> route('admin.dashboard'),
    ],
    [
        'name' => 'Roles',
        'href'=> route('admin.users.index'),
    ],
    ['name'=>'Nuevo'],
]">


<x-wire-card>
    <form action="{{route('admin.users.store')}}" method="POST">

@csrf
<x-wire-input 
label="Nombre" name="name" placeholder="Nombre de rol" value="{{old ('name')}}">

</x-wire-input>
<div class="flex justify-end mt-4">
 <x-wire-button type="submit" blue>Guardar</x-wire-button>
</div>

</form> 

</x-wire-card>


</x-admin-layout>