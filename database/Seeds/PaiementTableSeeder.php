<?php

use Illuminate\Database\Seeder;
use App\Paiement;
class PaiementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Paiement::class,10)->create();
    }
}
