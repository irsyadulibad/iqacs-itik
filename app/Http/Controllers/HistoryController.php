<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceValueResource;
use App\Models\DeviceValue;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function temperature()
    {
        return view('pages.device.history', [
            'type' => 'temperature',
            'title' => 'Riwayat Suhu',
            'unit' => 'Suhu',
        ]);
    }

    public function humidity()
    {
        return view('pages.device.history', [
            'type' => 'humidity',
            'title' => 'Riwayat Kelembaban',
            'unit' => 'Kelembaban',
        ]);
    }

    public function ammonia()
    {
        return view('pages.device.history', [
            'type' => 'ammonia',
            'title' => 'Riwayat Ammonia',
            'unit' => 'Ammonia',
        ]);
    }

    public function value(Request $request)
    {
        $records = DeviceValue::where('type', $request->type ?? 'temperature')
            ->orderBy('created_at', 'desc')
            ->limit(7)
            ->get();

        return DeviceValueResource::collection($records->reverse());
    }
}
