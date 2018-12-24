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

        
        
        $users = factory(App\User::class, 10)->create();

       
        $categorias = factory(App\Categoria::class, 10)->create();

        foreach ($categorias as $categoria) {
            $empresa = factory(App\Empresa::class)->create([
                'id_categoria' => $categoria->id
            ]);
        }

    }
}
