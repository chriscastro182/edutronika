<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombre' => 'Transistores',
        ]);

        Categoria::create([
            'nombre' => 'Actuadores'
        ]);

        Categoria::create([
            'nombre' => 'Tarjetas y Módulos',
            'image'  => 'img/categorias/arduino-nano.png',
            'orden'  => 1
        ]);

        Categoria::create([
            'nombre' => 'Microcontroladores',
            'image'  => 'img/categorias/PIC16F887.png',
            'orden'  => 3
        ]);

        Categoria::create([
            'nombre' => 'Capacitores'
        ]);

        Categoria::create([
            'nombre' => 'Inductores'
        ]);

        Categoria::create([
            'nombre' => 'Resistencias'
        ]);

        Categoria::create([
            'nombre' => 'Optoelectrónica'
        ]);

        Categoria::create([
            'nombre' => 'Energía'
        ]);

        Categoria::create([
            'nombre' => 'Kits, chasis, mecanismos y robótica'
        ]);

        Categoria::create([
            'nombre' => 'Programadores',
            'image'  => 'img/categorias/master.png',
            'orden'  => 2
        ]);

        Categoria::create([
            'nombre' => 'Circuitos Integrados',
        ]);

        Categoria::create([
            'nombre' => 'Otros'
        ]);
    }
}
