<?php

namespace App\Http\Controllers;

use App\Repositories\SensorValueRepository;
use Illuminate\Http\Request;

class SensorValueController extends Controller
{
    private SensorValueRepository $repo;

    public function __construct()
    {
        $this->repo = new SensorValueRepository();
    }


    public function temperature(Request $request)
    {
        return response()->json(
            $this->repo->getChartData(8, "temperature")
        );
    }

    public function humidity(Request $request)
    {
        return response()->json(
            $this->repo->getChartData(8, "humidity")
        );
    }
}
