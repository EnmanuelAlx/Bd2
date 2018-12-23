<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Translation\PluralizationRules;
use Illuminate\Support\Collection;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            'Camisa',
            'Pantalones',
            'Shots',
            'Cinturon',
            'Corbata',
            'Zapatos',
            'Anteojos',
            'Gafas de Sol',
            'Hamburguesa',
            'Hot dogs',
            'Pizza',
            'Arepa',
            'Arepa Zuliana',
            'Patacon',
            'Shawarma',
            'Tortilla',
            'Pasta',
            'Sushi',
            'Sandwich'
        ];

        $aditions = [
            'Blanco',
            'Negro',
            'Purpura',
            'Azul',
            'Lechuga',
            'Papas Fritas',
            'Carne',
            'Pollo',
            'Pescado'
        ];

        $empresa = factory(App\Empresa::class)->create();
        $users = factory(App\User::class, 20)->create();
        $productos = collect();
        foreach($products as $p){
            $productos->push(factory(App\Producto::class)->create([
                'descripcion' => $p
            ]));
        }
        $adicionales = collect();
        foreach($aditions as $a){
            $adicionales->push(factory(App\Adicional::class)->create([
                'descripcion' => $a
            ]));
        }

    
        $ordenes = factory(App\Orden::class, 10)->create([
            'id_usuario' => $users->random()->id
        ]);
        
        

    }
}
