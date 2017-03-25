<?php

use Illuminate\Database\Seeder;

class SiembraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Siembra::class,10)->create();
    }
}
