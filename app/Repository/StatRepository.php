<?php

namespace App\Repository;

use App\Models\DeviceValue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StatRepository
{
    public function average(string $type)
    {
        return DeviceValue::where('type', $type)
            ->whereDate('created_at', Carbon::today())
            ->avg('value') ?? 0;
    }

    public function charts(string $type)
    {
        $results = [];
        $lastHour = DeviceValue::whereDate('created_at', Carbon::today())
            ->orderBy('created_at', 'DESC')
            ->limit(1)
            ->first();

        foreach (range(0, 3) as $i) {
            $hour = $lastHour->created_at->subHours($i - 1)->format('H');
            $results["{$hour}:00"] = DeviceValue::whereDate('created_at', Carbon::now())
                ->where('type', $type)
                ->whereRaw('HOUR(created_at) = ?', [$hour])
                ->avg('value') ?? 0;
        }

        return $results;
    }
}
