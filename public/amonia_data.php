<?php

use App\Models\DeviceValue;

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

$humi = DeviceValue::create([
    'device_id' => $request->id_alat,
    'type' => 'ammonia',
    'value' => $request->nilai,
]);

header('Content-Type: application/json');
echo json_encode([
    'status' => 'ok',
    'message' => 'Success',
]);
