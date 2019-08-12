<?php

namespace App\Http\Controllers;

use App\Device;
use App\Appliance;
use App\Room;
use App\Site;
use App\Measurement;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = Site::select('id','site_name')
            ->where('site_status','Active')
            ->get();
        $rooms = Room::select('id','room_name','site_id')
            ->get();
        $devices = Appliance::select('devices.id','devices.device_status','devices.device_uuid','appliances.room_id')
            ->join('devices','devices.appliance_id','appliances.id')
            ->get();
        return view('devices.index')->with(compact(['sites','rooms','devices']));
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
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show(Device $device)
    {
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
            ->where('devices.id',$device->id)
            ->join('appliances','appliances.room_id','rooms.id')
            ->join('devices','devices.appliance_id','appliances.id')
        ->get();

        //Uptime
        
        //Watts totales
        $totalWatts = Measurement::where('device_id',$device->id)
            ->whereBetween('created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])->sum('measure');

        ///Total a pagar
        $bill = (($totalWatts / 1000) * 0.617)/30;
        $array = [
            'totalWatts' => $totalWatts,
            'bill' => $bill,
            'deviceName' => $device->device_uuid,
            'status' => $device->device_status,
            'location' => $location[0]->room_name,
            'deviceId' => $device->id
        ];
        return view('devices.show')->with(compact(['array']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
