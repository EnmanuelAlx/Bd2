<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Translation\PluralizationRules;
use Illuminate\Support\Collection;
use App\AdicionalProducto;

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

        foreach ($categorias as $key => $categoria) {
            $empresa = factory(App\Empresa::class)->create([
                'id_categoria' => $categoria->id
            ]);
            if($key==0){
                foreach($products as $producto){
                    factory(App\Producto::class)->create([
                        'descripcion' => $producto,
                        'id_empresa' => $empresa->id,
                    ]);
                }
                foreach($aditions as $adicional){
                    $id = factory(App\Adicional::class)->create([
                        'descripcion' => $adicional
                    ]);
                    AdicionalProducto::create([
                        'id_producto' => 1,
                        'id_adicional' => $id->id
                    ]);
                }
            }
        }

    }
}
