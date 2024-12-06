<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Repository\StatRepository;
use Illuminate\Http\Request;

class StatController extends Controller
{
    private StatRepository $repo;

    public function __construct()
    {
        $this->repo = new StatRepository;
    }

    public function index(Device $device)
    {
        $lastUpdate = $device->values()->orderBy('created_at', 'desc')->first()->created_at;
        $data = [
            'temperature' => (float) floatval($this->repo->average('temperature', $device->id)),
            'humidity' => (float) floatval($this->repo->average('humidity', $device->id)),
            'ammonia' => (float) floatval($this->repo->average('ammonia', $device->id)),
            'last_update' => $lastUpdate->locale("id")->format('H:i, d M Y'),
        ];

        return response()->json($data, options: JSON_PRESERVE_ZERO_FRACTION);
    }

    public function charts()
    {
        $results = [];

        foreach (range(0, 3) as $i) {
            $hour = now()->subHours($i)->format('H:i');
            $results[$hour] = [
                'temperature' => rand(20, 30) + (rand(0, 9) / 10),
                'ammonia'     => rand(10, 40) + (rand(0, 9) / 10),
                'humidity'    => rand(50, 90) + (rand(0, 9) / 10),
            ];
        }

        return response()->json($results, 200, [], JSON_UNESCAPED_SLASHES);
        // return response()->json([
        //     'temperature' => $this->repo->charts('temperature'),
        //     'humidity' => $this->repo->charts('humidity'),
        //     'ammonia' => $this->repo->charts('ammonia'),
        // ]);
    }
}
