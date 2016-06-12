<?php

use Illuminate\Database\Seeder;
use App\Models\Pays;

class PaysTableSeeder extends Seeder
{
    /**
     * Remplit la table pays
     *
     * @return void
     */
    public function run()
    {
        //DB::table('pays')->truncate();
        Pays::create([
            'id' => 1,
            'nom' => 'Suisse',
            'nomCourt' => 'CH',
        ]);
        Pays::create([
            'id' => 2,
            'nom' => 'France',
            'nomCourt' => 'FR',
        ]);
        Pays::create([
            'id' => 3,
            'nom' => 'Allemagne',
            'nomCourt' => 'DE',
        ]);
    }
}
