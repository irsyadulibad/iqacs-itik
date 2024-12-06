<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\ControlStateRepository;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    private ControlStateRepository $controlRepo;

    public function __construct()
    {
        $this->controlRepo = new ControlStateRepository;
    }

    public function manual(Request $request)
    {
        $state = boolval($request->state);

        $control = $state ?
            $this->controlRepo->setOn($request->device_id) :
            $this->controlRepo->setOff($request->device_id);

        return response()->json([
            'status' => 'ok',
            'message' => 'Berhasil mengupdate status relay',
        ]);
    }

    public function states()
    {
        $relays = [];
        $pumps = $this->controlRepo->getPumpState()
            ->map(fn($pump) => $pump->control_value);

        foreach (range(1, 10) as $i) {
            $relays[$i] = $this->controlRepo->getState($i)->control_value;
        }

        return response()->json([
            'status' => 'ok',
            'relays' => $relays,
            'pumps' => [
                1 => $pumps[0],
                2 => $pumps[1],
            ],
        ]);
    }
}
