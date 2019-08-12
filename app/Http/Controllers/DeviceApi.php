<?php

namespace App\Http\Controllers;

use App\Device;
use App\Appliance;
use App\Room;
use App\Site;
use App\Measurement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getValuesToChart(Request $request)
    {
        //Get Dates 
        $dates = Measurement::select('created_at')
            ->where('device_id',$request->deviceId)
            ->orderBy('created_at','DESC')
            ->get();
        //Get Device Name
        $deviceName = Device::select('device_uuid')
            ->where('id',$request->deviceId)
            ->get();
        //get Measure for device
        $array = [];
        $measurements = Measurement::select('measure','created_at')
            ->where('device_id',$request->deviceId)
            ->orderBy('created_at','DESC')
            ->take(10)
            ->get();
        foreach ($measurements as $measurement) {
            array_push($array, $measurement->measure);
        }

        $series = [
            'name' => $deviceName[0]->device_uuid,
            'data' => $array            
        ];
        /*$devices = Device::all();
        $list = array();

        foreach ($devices as $device) {
            $appliance = Appliance::find($device->appliance_id);
            $room = Room::find($appliance->room_id);
            $site = Site::find($room->site_id);

            $room = array(
                'id' => $room->id,
                'room_name' => $room->room_name,
                'description' => $room->description,
                'site' => $site,
                'created_at' => $room->created_at,
                'updated_at' => $room->created_at
            );

            $appliance = array(
                'id' => $appliance->id,
                'appliance_name' => $appliance->appliance_name,
                'description' => $appliance->description,
                'room' => $room,
                'created_at' => $appliance->created_at,
                'updated_at' => $appliance->updated_at
            );

            $device = array(
                'id' => $device->id,
                'device_uuid' => $device->device_uuid,
                'device_status' => $device->device_status,
                'creation_date' => $device->creation_date,
                'appliance' => $appliance,
                'created_at' => $device->created_at,
                'updated_at' => $device->updated_at
            );

            array_push($list, $device);
            
        }

        return array('devices' => $list);*/
        $array = [
            'dates' => $dates,
            'series' => [$series]
        ];
        return $array;
    }
    public function getDeviceData(Request $request){
        if((int)Carbon::now()->format('d') > 15){
            $currentMonth = Carbon::now()->format('Y-m');
            $nextMonth = Carbon::now()->addMonth(1)->format('Y-m');
        }else
        {
            $currentMonth = Carbon::now()->subMonth(1)->format('Y-m');
            $nextMonth = Carbon::now()->format('Y-m');    
        }
        //StartEnd debera tomarlo de la configuracion
        $startEnd = 15;
        $months = 1;
        $daysInMonth = Carbon::now()->daysInMonth;
        $measurements = Measurement::all();

        //Location
        $location = Room::select('rooms.room_name')
            ->where('devices.id',$request->deviceId)
            ->join('appliances','appliances.room_id','rooms.id')
            ->join('devices','devices.appliance_id','appliances.id')
        ->get();

        //getDeviceName
        $deviceName = Device::select('device_uuid','device_status')
            ->where('id',$request->deviceId)
            ->get();

        //Uptime
        
        //Watts totales
        $totalWatts = Measurement::where('device_id',$request->deviceId)
            ->whereBetween('created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])->sum('measure');

        ///Total a pagar
        $bill = (($totalWatts / 1000) * 0.617)/30;
        $array = [
            'totalWatts' => $totalWatts,
            'bill' => $bill,
            'deviceName' => $deviceName[0]->device_uuid,
            'status' => $deviceName[0]->device_status,
            'location' => $location[0]->room_name,
            'deviceId' => $request->deviceId
        ];
        return $array;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);
        $list = array();

        $appliance = Appliance::find($device->appliance_id);
        $room = Room::find($appliance->room_id);
        $site = Site::find($room->site_id);

        $room = array(
            'id' => $room->id,
            'room_name' => $room->room_name,
            'description' => $room->description,
            'site' => $site,
            'created_at' => $room->created_at,
            'updated_at' => $room->created_at
        );

        $appliance = array(
            'id' => $appliance->id,
            'appliance_name' => $appliance->appliance_name,
            'description' => $appliance->description,
            'room' => $room,
            'created_at' => $appliance->created_at,
            'updated_at' => $appliance->updated_at
        );

        $device = array(
            'id' => $device->id,
            'device_uuid' => $device->device_uuid,
            'device_status' => $device->device_status,
            'creation_date' => $device->creation_date,
            'appliance' => $appliance,
            'created_at' => $device->created_at,
            'updated_at' => $device->updated_at
        );

        array_push($list, $device);
            

        return $list;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
