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
        //En las consultas de abajo, verificar si el primer where afecta, de lo contrario unicamente
        //solo es cuestion de eliminarlo
        
        $currentMonth = Carbon::now()->format('Y-m');
        $startEnd = 15;
        $months = 1;
        $nextMonth = Carbon::now()->addMonth(1)->format('Y-m');

    	$daysInMonth = Carbon::now()->daysInMonth;
        $measurements = Measurement::all();

    	//$totalWatts = Measurement::where('created_at','like',$currentMonth.'%')->sum('measure');
        $totalWatts = Measurement::whereBetween('created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])->sum('measure');

        ///
    	$bill = (($totalWatts / 1000) * 0.617)/30;

    	$devicesHigh = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as maxwatts'))
    	->leftJoin('measurements','devices.id','=','measurements.device_id')
    	->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
    	->GroupBy('devices.id','devices.device_uuid')
    	->orderBy('maxwatts','DESC')->Take(3)->get();

    	$devicesLow = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as minwatts'))
    	->leftJoin('measurements','devices.id','=','measurements.device_id')
    	->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
    	->GroupBy('devices.id','devices.device_uuid')
    	->orderBy('minwatts','ASC')->Take(3)->get();

    	$wattsDay = Measurement::where('created_at','like',$currentMonth.'%')
    	->whereBetween('created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
        ->whereBetween(DB::raw('HOUR(created_at)'),['9','23'])
    	->sum('measure');

    	$wattsNight = Measurement::where('created_at','like',$currentMonth.'%')
    	->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
        ->whereBetween(DB::raw('HOUR(created_at)'),['0','8'])
    	->sum('measure');

    	$wattsPerWeek = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','0')
    	->where(DB::raw('WEEkDAY(created_at)'),'<=','4')
    	->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
    	->sum('measure');

    	$wattsPerWeekEnd = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','5')
    	->where(DB::raw('WEEkDAY(created_at)'),'<=','6')
    	->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
    	->sum('measure');

    	return view('dashboard')->with(compact(
    		['measurements','totalWatts','bill','devicesHigh','devicesLow','wattsDay','wattsNight',
    		'wattsPerWeek','wattsPerWeekEnd']
    	));
    }

    public function getDataIndex(){
        if((int)Carbon::now()->format('d') > 15){
            $currentMonth = Carbon::now()->format('Y-m');
            $nextMonth = Carbon::now()->addMonth(1)->format('Y-m');
        }else
        {
            $currentMonth = Carbon::now()->subMonth(1)->format('Y-m');
            $nextMonth = Carbon::now()->format('Y-m');    
        }
        
        $startEnd = 15;
        $months = 1;
        $daysInMonth = Carbon::now()->daysInMonth;
        $measurements = Measurement::all();

        //$totalWatts = Measurement::where('created_at','like',$currentMonth.'%')->sum('measure');
        $totalWatts = Measurement::whereBetween('created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])->sum('measure');

        ///
        $bill = (($totalWatts / 1000) * 0.617)/30;

        $devicesHigh = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as maxwatts'))
        ->leftJoin('measurements','devices.id','=','measurements.device_id')
        ->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
        ->GroupBy('devices.id','devices.device_uuid')
        ->orderBy('maxwatts','DESC')->Take(3)->get();

        $devicesLow = Device::select('devices.id','device_uuid',DB::raw('SUM(measurements.measure) as minwatts'))
        ->leftJoin('measurements','devices.id','=','measurements.device_id')
        ->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
        ->GroupBy('devices.id','devices.device_uuid')
        ->orderBy('minwatts','ASC')->Take(3)->get();

        $wattsDay = Measurement::whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 09:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:00:00')
        ])
        ->whereBetween(DB::raw('HOUR(created_at)'),['9','23'])
        ->sum('measure');

        $wattsNight = Measurement::whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
        ->whereBetween(DB::raw('HOUR(created_at)'),['0','8'])
        ->sum('measure');

        $wattsPerWeek = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','0')
        ->where(DB::raw('WEEkDAY(created_at)'),'<=','4')
        ->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
        ->sum('measure');

        $wattsPerWeekEnd = Measurement::where(DB::raw('WEEkDAY(created_at)'),'>=','5')
        ->where(DB::raw('WEEkDAY(created_at)'),'<=','6')
        ->whereBetween('measurements.created_at',[
            new Carbon($currentMonth.'-'.$startEnd.' 00:00:00'),
            new Carbon($nextMonth.'-'.$startEnd.' 23:59:59')
        ])
        ->sum('measure');

        $indexData = [];
       array_push($indexData,$totalWatts,$bill,$devicesHigh,$devicesLow,$wattsDay,$wattsNight,$wattsPerWeek,$wattsPerWeekEnd);
        return $indexData;
    }
}
