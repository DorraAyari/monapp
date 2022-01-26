<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CatalogueTableSeeder::class);
        $this->call(ProduitTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(PanierTableSeeder::class);
        $this->call(CommandeTableSeeder::class);
        $this->call(PaiementTableSeeder::class);
        $this->call(LivraisonTableSeeder::class);
        
      
       

    }
}
