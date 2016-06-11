<?php

use Illuminate\Database\Seeder;
use App\Models\Utilisateur;

class UtilisateursTableSeeder extends Seeder
{
    /**
     * Remplit la table utilisateurs
     *
     * @return void
     */
    public function run()
    {
        //DB::table('utilisateurs')->truncate();
        Utilisateur::create([
            'pseudo' => 'Adrien',
            'motDePasse' => bcrypt('adrien'),
            'anneeNaissance' => '1992',
            'paysId' => 1,
            'regionId' => 23,
        ]);
        Utilisateur::create([
            'pseudo' => 'Faten',
            'motDePasse' => bcrypt('faten'),
            'paysId' => 1,
        ]);
        Utilisateur::create([
            'pseudo' => 'Walid',
            'motDePasse' => bcrypt('walid'),
            'paysId' => 1,
        ]);
        Utilisateur::create([
            'pseudo' => 'Noemi',
            'motDePasse' => bcrypt('noemi'),
            'paysId' => 1,
        ]);
        Utilisateur::create([
            'pseudo' => 'Anne-Laure',
            'motDePasse' => bcrypt('anne-laure'),
            'paysId' => 1,
        ]);
        Utilisateur::create([
            'pseudo' => 'Laure',
            'motDePasse' => bcrypt('laure'),
            'paysId' => 1,
        ]);
    }
}
