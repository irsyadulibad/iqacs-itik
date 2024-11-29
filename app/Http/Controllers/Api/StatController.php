<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\StatRepository;
use Illuminate\Http\Request;

class StatController extends Controller
{
    private StatRepository $repo;

    public function __construct()
    {
        $this->repo = new StatRepository;
    }

    public function index(string $device_id)
    {
        return response()->json([
            'temperature' => $this->repo->average('temperature', $device_id),
            'humidity' => $this->repo->average('humidity', $device_id),
            'ammonia' => $this->repo->average('ammonia', $device_id),
        ]);
    }

    public function charts()
    {
        return response()->json([
            'temperature' => $this->repo->charts('temperature'),
            'humidity' => $this->repo->charts('humidity'),
            'ammonia' => $this->repo->charts('ammonia'),
        ]);
    }
}
