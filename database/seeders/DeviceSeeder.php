<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 4; $i++)
            Device::create([
                'uuid' => Str::uuid(),
                'name' => "Alat {$i}",
                "latitude" => "-8.37060574155791{$i}",
                "longitude" => "113.4155198855115{$i}",
            ]);
    }
}
