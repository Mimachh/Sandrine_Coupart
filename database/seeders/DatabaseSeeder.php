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

        DB::table('statuts')->insert([
 
            ['id'=>'1', 'name' => 'En ligne'],
            ['id'=>'2', 'name' => 'Hors ligne'],
            ['id'=>'3', 'name' => 'Archivé'],
            ['id'=>'4', 'name' => 'En attente'],
            
        ]);

        DB::table('users')->insert([
 
            ['id'=>'1', 'name' => 'Admin', 'last_name' => 'Istrateur', 'email' => 'admin@gmail.com', 'password' => '$2y$10$lqRTDl7IEz3G8mMsOs9AMeuUMfPF77YAOF87XU2LmucpV3i6RpnYy', 'role_id' => '1'],
            ['id'=>'2', 'name' => 'Uti', 'last_name' => 'Listaeur', 'email' => 'user@gmail.com', 'password' => '$2y$10$lqRTDl7IEz3G8mMsOs9AMeuUMfPF77YAOF87XU2LmucpV3i6RpnYy', 'role_id' => '2'],
            
        ]);

        DB::table('allergenes')->insert([
 
            ['id'=>'1', 'name' => 'Oeufs'],
            ['id'=>'2', 'name' => 'Lait'],
            ['id'=>'3', 'name' => 'Farine'],
            
        ]);

        DB::table('recettes')->insert([
 
            ['id'=>'1', 'title' => 'Crêpes', 'description' => 'Recette de crêpes sans lactose', 'preparation' => '00:00:30', 'rest' => '00:02:30', 'cooking' => '00:00:15', 'ingredients' => 'Oeufs, Sucre, Farine, Lait Végétal (Amande ou Riz), Sel, Beurre', 'steps' => '3', 'statut_id' => '1'],
            
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

        DB::table('regime_user')->insert([
 
            ['id'=>'1', 'regime_id' => '1', 'user_id' => '2'],
            ['id'=>'2', 'regime_id' => '1', 'user_id' => '2'],
        ]);

        DB::table('allergene_user')->insert([
 
            ['id'=>'1', 'allergene_id' => '2', 'user_id' => '2'],
            ['id'=>'2', 'allergene_id' => '3', 'user_id' => '2'],
        ]);

        DB::table('subjects')->insert([
 
            ['id'=>'1', 'name' => 'Réclamation'],
            ['id'=>'2', 'name' => 'Prendre un RDV'],
            ['id'=>'3', 'name' => 'Devenir patient'],
            ['id'=>'4', 'name' => 'Autre']
        ]);

        DB::table('contacts')->insert([
 
            ['id'=>'1', 'name' => 'LOR', 'last_name' => 'EmIpsum', 'email' => 'lorem@gmail.com', 'phone' => '0243434343', 'subject_id' => '2', 'message' => "Bonjour, j'aimerai avoir un rendez-vous dans la semaine s'il vous plait", 'statut_id' => '4'],
        ]);

    }
}
