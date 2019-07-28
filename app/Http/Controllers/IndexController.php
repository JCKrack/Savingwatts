<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Measurement;
use App\Device;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function Index(){
    	$currentMonth = Carbon::now()->format('Y-m');
    	$daysInMonth = Carbon::now()->daysInMonth;
    	$totalWatts = Measurement::where('created_at','like',$currentMonth.'%')->sum('measure');
    	$measurements = Measurement::all();
    	$bill = (($totalWatts / 1000) * 0.617)/30;

    	$devicesHigh = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as maxwatts'))
    	->leftJoin('measurements','devices.id','=','measurements.device_id')
    	->where('measurements.created_at','like',$currentMonth.'%')
    	->GroupBy('devices.id','devices.device_uuid')
    	->orderBy('maxwatts','DESC')->Take(3)->get();

    	$devicesLow = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as minwatts'))
    	->leftJoin('measurements','devices.id','=','measurements.device_id')
    	->where('measurements.created_at','like',$currentMonth.'%')
    	->GroupBy('devices.id','devices.device_uuid')
    	->orderBy('minwatts','ASC')->Take(3)->get();

    	$wattsDay = Measurement::where('created_at','like',$currentMonth.'%')
    	->whereBetween('created_at',[
    		new Carbon($currentMonth.'-1'.' 00:00:00'),
    		new Carbon($currentMonth.'-'.$daysInMonth.' 23:59:59')
    	])->whereBetween(DB::raw('HOUR(created_at)'),['9','23'])
    	->sum('measure');

    	$wattsNight = Measurement::where('created_at','like',$currentMonth.'%')
    	->whereBetween('created_at',[
    		new Carbon($currentMonth.'-1'.' 00:00:00'),
    		new Carbon($currentMonth.'-'.$daysInMonth.' 23:59:59')
    	])->whereBetween(DB::raw('HOUR(created_at)'),['0','9'])
    	->sum('measure');

    	$wattsPerWeek = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','0')
    	->where(DB::raw('WEEkDAY(created_at)'),'<=','4')
    	->where('created_at','like',$currentMonth.'%')
    	->sum('measure');

    	$wattsPerWeekEnd = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','5')
    	->where(DB::raw('WEEkDAY(created_at)'),'<=','6')
    	->where('created_at','like',$currentMonth.'%')
    	->sum('measure');

    	return view('dashboard')->with(compact(
    		['measurements','totalWatts','bill','devicesHigh','devicesLow','wattsDay','wattsNight',
    		'wattsPerWeek','wattsPerWeekEnd']
    	));
    }

    public function getDataIndex(){
        $currentMonth = Carbon::now()->format('Y-m');
        $daysInMonth = Carbon::now()->daysInMonth;
        $totalWatts = Measurement::where('created_at','like',$currentMonth.'%')->sum('measure');
        $measurements = Measurement::all();
        $bill = (($totalWatts / 1000) * 0.617)/30;

        $devicesHigh = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as maxwatts'))
        ->leftJoin('measurements','devices.id','=','measurements.device_id')
        ->where('measurements.created_at','like',$currentMonth.'%')
        ->GroupBy('devices.id','devices.device_uuid')
        ->orderBy('maxwatts','DESC')->Take(3)->get();

        $devicesLow = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as minwatts'))
        ->leftJoin('measurements','devices.id','=','measurements.device_id')
        ->where('measurements.created_at','like',$currentMonth.'%')
        ->GroupBy('devices.id','devices.device_uuid')
        ->orderBy('minwatts','ASC')->Take(3)->get();

        $wattsDay = Measurement::where('created_at','like',$currentMonth.'%')
        ->whereBetween('created_at',[
            new Carbon($currentMonth.'-1'.' 00:00:00'),
            new Carbon($currentMonth.'-'.$daysInMonth.' 23:59:59')
        ])->whereBetween(DB::raw('HOUR(created_at)'),['9','23'])
        ->sum('measure');

        $wattsNight = Measurement::where('created_at','like',$currentMonth.'%')
        ->whereBetween('created_at',[
            new Carbon($currentMonth.'-1'.' 00:00:00'),
            new Carbon($currentMonth.'-'.$daysInMonth.' 23:59:59')
        ])->whereBetween(DB::raw('HOUR(created_at)'),['0','9'])
        ->sum('measure');

        $wattsPerWeek = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','0')
        ->where(DB::raw('WEEkDAY(created_at)'),'<=','4')
        ->where('created_at','like',$currentMonth.'%')
        ->sum('measure');

        $wattsPerWeekEnd = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','5')
        ->where(DB::raw('WEEkDAY(created_at)'),'<=','6')
        ->where('created_at','like',$currentMonth.'%')
        ->sum('measure');

        $indexData = [];
        array_push($indexData,$totalWatts,$bill,$devicesHigh,$devicesLow,$wattsDay,$wattsNight,$wattsPerWeek,$wattsPerWeekEnd);
        return $indexData;
    }
}
