<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //crear usuario de prueba para que se ejecuten migraciones
        User::factory()->create([
            'name' => 'Roberto Basto',
            'email' => 'roberto54@gmail.com',
            'password'=> bcrypt('12345678'),
            'id_number'=>'123456789',
            'phone'=>'5555555555',
            'address'=>'Calle 123, Colonia 456',

        ])->assignRole('Doctor');
    }
}
