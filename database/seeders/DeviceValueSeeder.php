<?php

namespace Database\Seeders;

use App\Models\DeviceValue;
use Illuminate\Database\Seeder;

class DeviceValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeviceValue::factory(40)->create();
    }
}
