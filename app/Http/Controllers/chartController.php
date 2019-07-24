<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use App\Device;

class chartController extends Controller
{
    public function getAllMeasure()
    {
    	$arrayDevices = [];
    	$arrayMeasurements = [];
    	$devices = Device::get();
    	foreach ($devices as $device)
    	{
    		array_push($arrayDevices,$device->id);
    		$measurements = Measurement::where('device_id',$device->id)->take(3)->get();
    		foreach ($measurements as $measure) {
    			array_push($arrayDevices,[$measure->measure]);
    		}
    	}
    	$array = array(
    		'Measurements' => array("200","100","300","400")
    	);
    	return json_encode($array);
    }
}
