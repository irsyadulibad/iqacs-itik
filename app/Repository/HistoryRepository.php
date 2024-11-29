<?php

namespace App\Repository;

use App\Models\DeviceValue;
use Carbon\Carbon;

class HistoryRepository
{
    public function value(Carbon $start, Carbon $end, string $type = 'temperature')
    {
        $days = $start->diffInDays($end) + 1;
        $query = DeviceValue::query()
            ->where('type', $type)
            ->orderBy('created_at', 'desc');

        if ($days < 2) {
            return $query->whereDate('created_at', $start)
                ->orderBy('created_at', 'desc')
                ->limit(7)
                ->get();
        }

        return $query->selectRaw('AVG(value) value, DATE(created_at) label')
            ->whereDate('created_at', '>=', $start)
            ->whereDate('created_at', '<=', $end)
            ->groupBy('label')
            ->get();
    }
}
