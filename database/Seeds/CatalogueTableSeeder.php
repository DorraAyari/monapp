<?php

use Illuminate\Database\Seeder;
use App\Catalogue;
class CatalogueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Catalogue::class,10)->create();

    }
}
