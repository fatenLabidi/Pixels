<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Enlève temporairement les protections type "contraintes de clés étrangères"
        Eloquent::unguard();
        Schema::disableForeignKeyConstraints();
        
        $this->call(PaysTableSeeder::class);
        $this->call(RegionTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(UtilisateursTableSeeder::class);  
        
        Schema::enableForeignKeyConstraints();
    }
}
