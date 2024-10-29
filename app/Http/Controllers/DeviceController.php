<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceValueResource;
use App\Http\Resources\ValueQualityResource;
use App\Models\Device;
use App\Models\DeviceValue;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function show(Device $device)
    {
        return view('pages.device.show', compact('device'));
    }

    public function deviceValue(Device $device, Request $request)
    {
        $records = DeviceValue::where('type', $request->type ?? 'temperature')
            ->where('device_id', $device->id)
            ->orderBy('created_at', 'desc')
            ->limit(7)
            ->get();

        return DeviceValueResource::collection($records->reverse());
    }

    public function valueQuality(Device $device, Request $request)
    {
        $record = DeviceValue::orderBy('created_at', 'desc')
            ->where('device_id', $device->id)
            ->where('type', $request->type ?? 'temperature')
            ->limit(1)
            ->first();

        return ValueQualityResource::make($record);
    }
}
