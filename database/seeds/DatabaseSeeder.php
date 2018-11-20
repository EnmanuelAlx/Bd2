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
        $sucursales = factory(App\Sucursal::class, 3)->create([
            'id_empresa' => $empresa->id
        ]);
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

        foreach($sucursales as $sucursal){
            $random_products = $productos->random(8);
            foreach($random_products as $product){
                $sucursal->productos()->attach($product->id, ['cantidad' => rand(1, 100)]);
            } 
        }


        $ordenes = factory(App\Orden::class, 10)->create([
            'id_usuario' => $users->random()->id
        ]);
        
        

    }
}
