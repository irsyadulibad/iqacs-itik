<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\SensorValueResource;
use App\Models\SensorValue;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function create(Request $request)
    {
        $data = SensorValue::create([
            'id_alat' => $request->id_alat ?? null,
            'nilai' => $request->nilai ?? 0,
            'tipe' => $request->tipe ?? 0,
        ]);

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => SensorValueResource::make($data),
        ]);
    }
}
