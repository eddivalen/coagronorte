<?php

use Illuminate\Database\Seeder;

class VisitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Visita::class,6)->create();
    }
}
