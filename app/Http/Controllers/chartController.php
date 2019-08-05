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
        $data = [];
        $arrayMeasurements = [];
        $arrayMeasurementGroup = [];
        $arrayDevices = [];
        $arrayDates = [];
    	$currentDate = Carbon::now()
        ->addUnitNoOverFlow('hour',17,'day')
        ->format('Y-M-d H:i');
        array_push($arrayDates,$currentDate);
        for ($i=1; $i < 3 ; $i++) { 
            $currentDate = Carbon::now()
            ->addUnitNoOverFlow('hour',17,'day')
            ->subMinutes($i)->format('Y-M-d H:i');
            array_push($arrayDates,$currentDate);
        }

        $devices = Device::select('id','device_uuid')->get();
        foreach ($devices as $device) {
            array_push($arrayDevices,[$device->device_uuid]);
        }
        array_push($data,$arrayDevices);
        foreach ($devices as $device) {
            $measurements = Measurement::select('device_id','measure')
            ->where('device_id',$device->id)->orderBy('created_at','DESC')->take(4)->get();
            $count = 0;
            foreach ($measurements as $measurement) {
                if ($count > 2)
                {
                    array_push($arrayMeasurements,$arrayMeasurementGroup);
                    $arrayMeasurementGroup = [];
                }
                else
                {
                    array_push($arrayMeasurementGroup,$measurement->measure);
                    $count++;
                }
            }
        }
        array_push($data,$arrayMeasurements);
        array_push($data,$arrayDates);
    	return $data;
    }
}
