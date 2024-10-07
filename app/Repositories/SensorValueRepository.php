<?php

namespace App\Repositories;

use App\Models\SensorValue;

class SensorValueRepository
{
    public function getChartData(int $show, string $type)
    {
        $parsed = [
            'labels' => [],
            'values' => [],
        ];

        $data = SensorValue::where('tipe', $type)
            ->orderBy('created_at', 'desc')
            ->limit($show)->get();

        $data->map(function ($dt) use (&$parsed) {
            $parsed['labels'][] = $dt->created_at->format('H:i');
            $parsed['values'][] = $dt->nilai;
        });

        $parsed['labels'] = array_reverse($parsed['labels']);
        $parsed['values'] = array_reverse($parsed['values']);

        return $parsed;
    }
}
