<?php

use Illuminate\Database\Seeder;
use App\Models\Region;

class RegionTableSeeder extends Seeder
{
    /**
     * Remplit la table région
     *
     * @return void
     */
    public function run()
    {
        //DB::table('regions')->truncate();
        Region::create([
            'nom' => 'Argovie',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Appenzell RI',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Appenzell RE',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Berne',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Bâle Campagne',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Bâle Ville',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Fribourg',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Genève',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Glaris',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Grisons',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Jura',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Lucerne',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Neuchâtel',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Nidwald',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Obwald',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Saint-Gall',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Schaffhouse',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Soleure',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Schwytz',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Thurgovie',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Tessin',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Uri',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Vaud',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Valais',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Zug',
            'paysId' => 1,
        ]);
        Region::create([
            'nom' => 'Zürich',
            'paysId' => 1,
        ]);
        
    }
}
