<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Translation\PluralizationRules;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $empresa = factory(App\Empresa::class)->create();
        $users = factory(App\User::class, 20)->create();
        $sucursales = factory(App\Sucursal::class, 3)->create([
            'id_empresa' => $empresa->id
        ]);

        $productos = factory(App\Producto::class, 50)->create();

        $ordenes = factory(App\Orden::class, 10)->create([
            'id_usuario' => $users->random()->id
        ]);
        

        // $users->each(function(App\User $user) use ($users){
        //     $orden = factory(App\Orden::class) -> create([
        //         'id_usuario' => $user->id
        //     ]);

        // });

    }
}
