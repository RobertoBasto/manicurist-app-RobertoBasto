<?php

namespace App\Livewire\Admin\Datatables;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductTable extends DataTableComponent
{
    //se comente para personalizar consultas
   protected $model = Product::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Nombre", "name")
                ->sortable(),
            Column::make("Marca", "brand")
                ->sortable(),
            Column::make("Precio en pesos", "price")
                ->sortable(),
              Column::make("Acciones")
                ->label(function($row){
                    return view('admin.products.actions',
                   ['product'=> $row] );
                })
            
        ];
    }
}