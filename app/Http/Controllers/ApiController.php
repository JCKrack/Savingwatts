<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    //
    public function insertValues($stationId,$value){
    	$insertValues;
    	$insertValues = $stationId.",".$value;
    	$stations = DB::select('CALL usp_SpecificLimitRegister(?, @response)',[$insertValues]);


    }
}
