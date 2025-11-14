<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Producto::create([
            'nombre' => 'Computadora',
            'descripcion' => 'Computadora de escritorio básica.',
            'precio' => 12000.50
        ]);

        Producto::create([
            'nombre' => 'Mouse Inalámbrico',
            'descripcion' => 'Mouse óptico con conexión bluetooth.',
            'precio' => 250.99
        ]);

        Producto::create([
            'nombre' => 'Teclado mecánico',
            'descripcion' => 'Teclado con switches azules.',
            'precio' => 899.00
        ]);
    

    }
}
