<?php

namespace App\Repository;

use Illuminate\Support\Facades\DB;

class ControlStateRepository
{
    public function getState(int $relayID)
    {
        return $this->getBuilder()->where('id_alat', $relayID)->first();
    }

    public function setOn(int $relayID)
    {
        $this->getBuilder()->where('id_alat', $relayID)->update(['control_value' => 1]);
        $this->togglePump($relayID, 1);
    }

    public function setOff(int $relayID)
    {
        $this->getBuilder()->where('id_alat', $relayID)->update(['control_value' => 0]);
        $this->togglePump($relayID, 0);
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
