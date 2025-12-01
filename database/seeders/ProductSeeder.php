<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory()->create([
            'name' =>'Tinte para cabello',
        'brand' => 'Garner',
        'price' => '56',
        ]);
         Product::factory()->create([
           'name' =>'Tinte para cabello',
        'brand' => 'Colortech',
        'price' => '55', 

        ]);

         Product::factory()->create([
            'name' => 'Lima de uñas',
            'brand' => 'Desconocida',
        'price' => '25',

        ]);
    }
}


