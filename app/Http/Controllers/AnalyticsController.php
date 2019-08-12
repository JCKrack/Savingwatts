<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Measurement;
use App\Device;

class AnalyticsController extends Controller
{
    //
    public function Index(){
    	$devices = Device::select('device_uuid')
    		->where('device_status','active')
    		->get();
    	return view('analytics')->with(compact(['devices']));
    }
    public function Filter(Request $request){
    	//Asignacion de variables a los parametros recibidos
    	$startDate = new Carbon($request->StartDate);
    	$endDate = new Carbon($request->EndDate);
    	$devices = $request->device;
    	$maxWatts = $request->maxWatts;
    	$minWatts = $request->minWatts;
    	//Formato a fecha
    	$startDate = $startDate->format('Y-m-d');
    	$endDate = $endDate->format('Y-m-d');
    	//diferencia de dias
    	$totalDays = Carbon::parse($startDate)->diff(Carbon::parse($endDate))->days;
    	//Array con las fechas a graficar
    	$dates = [];
    	for ($i=0; $i <= $totalDays; $i++) { 
    		$date = Carbon::parse($startDate)->addDays($i)->format('Y-m-d');
    		array_push($dates,$date);
    	}
    	//Array con dispositivos seleccionado y sus valores para cada fecha
    	$series = [];
        //$devices = Device::all();
        
        
        foreach ($devices as $device) {
            $array = [];
            foreach ($dates as $date) {
                $measurements = Measurement::select('measure','measurements.created_at','measurements.device_id')
                ->join('devices','devices.id','measurements.device_id')
                ->where('device_uuid',$device)
                ->where('measurements.created_at','like',$date.'%')
                ->where('measurements.measure','>=',$minWatts)
                ->where('measurements.measure','<=',$maxWatts)
                ->sum('measure');
                array_push($array, $measurements);
            }

            $serie = [
                    'name' => $device,
                    'data' => $array
                
            ];

            array_push($series,$serie);
        }
    	//Array object para return
    	$array = [
    		'dates' => $dates,
    		'series' => $series
    	];


    	return $array;

    }
}
