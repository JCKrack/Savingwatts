<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use App\Device;
use Carbon\Carbon;

class chartController extends Controller
{
    public function getAllMeasure()
    {
        
        $dates = [];
        
        $currentDate = Carbon::now()
            ->setTimeZone('America/Tijuana')
            ->format('Y-M-d H:i');
        array_push($dates,$currentDate);

        for ($i=1; $i < 5 ; $i++) { 
            $currentDate = Carbon::now()
            ->setTimeZone('America/Tijuana')
            ->subMinutes($i)->format('Y-M-d H:i');
            array_push($dates,$currentDate);
        }


        $series = [];
        $devices = Device::all();
        
        
        foreach ($devices as $device) {
            $array = [];
            $measurements = Measurement::select('measure')
                ->where('device_id',$device->id)
                ->take(3)
                ->get();

            foreach ($measurements as $measurement) {
                array_push($array, $measurement->measure);
            }

            $serie = [
                    'name' => $device->device_uuid,
                    'data' => $array
                
            ];

            array_push($series,$serie);
        }

        $array = [
            'dates' => $dates,
            'series' => $series
        ];

    	return $array;
    }
}
