<?php

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Remplit la table catégories
     *
     * @return void
     */
    public function run()
    {
        //DB::table('categories')->truncate();
        Categorie::create([
            'nom' => 'Stress',
        ]);
        Categorie::create([
            'nom' => 'Estime de soi',
        ]);
        Categorie::create([
            'nom' => 'Sexualité',
        ]);
        Categorie::create([
            'nom' => 'Boire, fumer, se droguer',
        ]);
        Categorie::create([
            'nom' => 'Santé',
        ]);
        Categorie::create([
            'nom' => 'Manger - bouger',
        ]);
    }
}
