<?php

namespace App\Http\Controllers;

use App\Device;
use App\Appliance;
use App\Room;
use App\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $devices = Device::all();
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

        return view('devices.index');
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
        return view('devices.show', ['device' => $device]);
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
