<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index($station){
    	$stations = DB::select('select name from appliances');
    	$stationActual = DB::select('select name from appliances where name = ?',[$station]);
    	$readings = DB::select('select me.created_at,me.value from measurements as me
		join appliances as ap on ap.appliance_uuid = me.appliance_uuid
		where name = ? ORDER BY me.id desc limit 10;',[$station]);
        $maxVolt = DB::select('select me.value from measurements as me
        join appliances as ap on ap.appliance_uuid = me.appliance_uuid
        where name = ?;',[$station]);
        $minVolt;
        $totalVolt;
        $upTime;
        $promVolt;


    	return view('home',compact("stations","stationActual","readings"));

    }

    public function test(Request $request)
    {
        $readings = DB::select('select max(me.value) as valueMax, min(me.value) as valueMin, avg(me.value) as valueProm, max(me.created_at) as lastUpdate, sum(me.value) as totalVolt from measurements as me
        join appliances as ap on ap.appliance_uuid = me.appliance_uuid
        where name = ?;',[$request->station]);
        return $readings;
    }

     public function getDatas(Request $request)
     {
        $readings = DB::select('select me.created_at,me.value from measurements as me
        join appliances as ap on ap.appliance_uuid = me.appliance_uuid
        where name = ? ORDER BY me.id desc limit 10;',[$request->station]);
        return $readings;
     }

     public function getDataMetre(Request $request)
     {
        $readings = DB::select('select me.created_at,me.value from measurements as me
        join appliances as ap on ap.appliance_uuid = me.appliance_uuid
        where name = ? ORDER BY me.id desc limit 1;',[$request->station]);
        return $readings;

     }

     public function wattsValues(Request $request){
        $readings = DB::select('select max(me.value) as valueMax, min(me.value) as valueMin, avg(me.value) as valueProm, max(me.created_at) as lastUpdate, sum(me.value) as totalVolt from measurements as me
        join appliances as ap on ap.appliance_uuid = me.appliance_uuid
        where name = ?;',[$request->station]);
        return $readings;



     }
}
