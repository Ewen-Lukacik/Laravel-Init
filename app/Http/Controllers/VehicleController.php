<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function readVehicle(Request $request, int $id)
    {

        $vehicles = file_get_contents('https://swapi.dev/api/vehicles/' . $id);
        $vehicles_decoded = json_decode($vehicles, true);

        return view('vehicles', [
            'title' => "vehicles",
            'vehicle' => $vehicles_decoded
        ]);
    }
}
