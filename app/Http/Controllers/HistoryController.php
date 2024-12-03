<?php

namespace App\Http\Controllers;

use App\Http\Resources\DeviceValueResource;
use App\Models\DeviceValue;
use App\Repository\HistoryRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HistoryController extends Controller
{
    private HistoryRepository $repo;

    public function __construct()
    {
        $this->repo = new HistoryRepository;
    }

    public function temperature()
    {
        return view('pages.device.history', [
            'type' => 'temperature',
            'title' => 'Riwayat Suhu',
            'unit' => 'Suhu',
        ]);
    }

    public function humidity()
    {
        return view('pages.device.history', [
            'type' => 'humidity',
            'title' => 'Riwayat Kelembaban',
            'unit' => 'Kelembaban',
        ]);
    }

    public function ammonia()
    {
        return view('pages.device.history', [
            'type' => 'ammonia',
            'title' => 'Riwayat Ammonia',
            'unit' => 'Ammonia',
        ]);
    }

    public function value(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->start);
        $end = Carbon::createFromFormat('Y-m-d', $request->end);
        $records = $this->repo->value($start, $end, $request->type);

        return DeviceValueResource::collection($records->reverse());
    }

    public function export(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->start);
        $end = Carbon::createFromFormat('Y-m-d', $request->end);
        $excel = $this->repo->export($start, $end, $request->type);
        $filename = "Riwayat " . ucfirst($request->type);

        return Excel::download($excel, $filename . ".xlsx");
    }
}
