<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('roles')->insert([
 
            ['id'=>'1', 'name' => 'Admin'],
            ['id'=>'2', 'name' => 'Patient'],
            
        ]);

        DB::table('allergenes')->insert([
 
            ['id'=>'1', 'name' => 'Oeufs'],
            ['id'=>'2', 'name' => 'Lait'],
            ['id'=>'3', 'name' => 'Farine'],
            
        ]);

        DB::table('recettes')->insert([
 
            ['id'=>'1', 'title' => 'Crêpes', 'descriptions' => 'Recette de crêpes sans lactose', 'preparation' => '00:00:30', 'rest' => '00:02:30', 'cooking' => '00:00:15', 'ingredients' => 'Oeufs, Sucre, Farine, Lait Végétal (Amande ou Riz), Sel, Beurre', 'steps' => '3'],
            
        ]);

        DB::table('regimes')->insert([
 
            ['id'=>'1', 'type' => 'Sans Lactose'],
            ['id'=>'2', 'type' => 'Sans Fruits à coque'],
            
        ]);

        DB::table('allergene_recette')->insert([
 
            ['id'=>'1', 'recette_id' => '1', 'allergene_id' => '1'],
            ['id'=>'2', 'recette_id' => '1', 'allergene_id' => '3'],
        ]);

        DB::table('recette_regime')->insert([
 
            ['id'=>'1', 'recette_id' => '1', 'regime_id' => '1'],
            ['id'=>'2', 'recette_id' => '1', 'regime_id' => '2'],
        ]);
    }
}
