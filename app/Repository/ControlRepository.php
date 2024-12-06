<?php

namespace App\Repository;

use App\Models\Control;

class ControlRepository
{
    public static function update($deviceID, $morning, $afternoon)
    {
        $stateRepo = new ControlStateRepository;

        static::store($deviceID, $stateRepo->convertID($deviceID), 'morning', $morning);
        static::store($deviceID, $stateRepo->convertID($deviceID), 'afternoon', $afternoon);
    }

    private static function store($deviceID, $relayID, $type, $data)
    {
        return Control::updateOrCreate([
            'device_id' => $deviceID,
            'type' => $type,
        ], [
            'relay_id' => $relayID,
            'start' => $data['start'],
            'end' => $data['end'],
        ]);
    }
}
