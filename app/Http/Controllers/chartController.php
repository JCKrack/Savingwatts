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
            ->format('Y-m-d H:i');
        array_push($dates,$currentDate);

        for ($i=1; $i < 5 ; $i++) { 
            $currentDate = Carbon::now()
            ->setTimeZone('America/Tijuana')
            ->subMinutes($i)->format('Y-m-d H:i');
            array_push($dates,$currentDate);
        }


        $series = [];
        $devices = Device::all();
        
        
        foreach ($devices as $device) {
            $array = [];
            foreach ($dates as $date) {
                $measurements = Measurement::select('measure','created_at','device_id')
                ->where('device_id',$device->id)
                ->where('created_at','like',$date.'%')
                ->sum('measure');
                array_push($array, $measurements);
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
        //////////////////Seperador
        //$fecha = new Carbon('2019-08-06 18:44');
        //$measurement = Measurement::where('device_id','1')
        //->where('created_at','like',$dates[0].'%')->get();
        //where('created_at','like',new Carbon('2019-08-06 18:44').'%')->get();
        ///// Borrar todo esto
    	return $array;
    }
}
