<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ControlStateRepository
{
    public function getState(int $relayID)
    {
        $relayID = $this->convertID($relayID);
        return $this->getBuilder()->where('id_alat', $relayID)->first();
    }

    public function getPumpState()
    {
        return $this->getBuilder()->whereIn('id_alat', [6, 12])->get();
    }

    public function setOn(int $relayID)
    {
        $relayID = $this->convertID($relayID);

        $this->getBuilder()->where('id_alat', $relayID)->update(['control_value' => 1]);
        $this->togglePump($relayID, 1);
    }

    public function setOff(int $relayID)
    {
        $relayID = $this->convertID($relayID);

        $this->getBuilder()->where('id_alat', $relayID)->update(['control_value' => 0]);
        $this->togglePump($relayID, 0);
    }

    public function convertID(int $relayID)
    {
        if (in_array($relayID, range(1, 5)))
            return $relayID;

        return $relayID + 1;
    }

    private function togglePump(int $relayID, int $state)
    {
        $pumpId = in_array($relayID, range(1, 5)) ? 6 : 12;
        $relays = $pumpId == 6 ? range(1, 5) : range(7, 11);

        if ($state == 1) {
            $this->getBuilder()->where('id_alat', $pumpId)->update(['control_value' => $state]);
            return true;
        }

        $activeRelays = $this->getBuilder()->whereIn('id_alat', $relays)
            ->where('control_value', 1)
            ->count();

        if ($activeRelays < 1)
            $this->getBuilder()->where('id_alat', $pumpId)->update(['control_value' => $state]);

        return true;
    }

    private function getBuilder()
    {
        return DB::table('control_state');
    }
}
