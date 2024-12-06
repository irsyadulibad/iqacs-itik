<?php

namespace App\Repository;

use App\Models\DeviceValue;
use Carbon\Carbon;

class StatRepository
{
    public function average(string $type, string $device_id): float
    {
        return DeviceValue::where('type', $type)
            ->where('device_id', $device_id)
            ->orderBy('created_at', 'desc')
            ->value('value') ?? 0.0;
    }

    public function charts(string $type)
    {
        $results = [];
        $lastHour = DeviceValue::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->first();

        foreach (range(0, 3) as $i) {
            $hour = $lastHour->created_at->subHours($i)->format('H');
            $results["{$hour}:00"] = DeviceValue::whereDate('created_at', Carbon::now())
                ->where('type', $type)
                ->whereRaw('HOUR(created_at) = ?', [$hour])
                ->avg('value') ?? 0;
        }

        return $results;
    }
}
