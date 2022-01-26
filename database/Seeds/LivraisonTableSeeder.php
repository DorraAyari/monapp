<?php

use Illuminate\Database\Seeder;
use App\Livraison;
class LivraisonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Livraison::class,10)->create();
    }
}
