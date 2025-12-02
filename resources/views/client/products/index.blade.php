<x-client-layout :breadcrumbs="[
    [
        'name'=>'Dashboard',
        'href'=> route('client.dashboard'),
    ],
    ['name' => 'Products'],
]">
@livewire('admin.datatables.product-table')
</x-client-layout>