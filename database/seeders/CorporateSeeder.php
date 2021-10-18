<?php

namespace Database\Seeders;

use App\Models\Corporate;
use Illuminate\Database\Seeder;

class CorporateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Corporate::factory(10)->create();
    }
}
