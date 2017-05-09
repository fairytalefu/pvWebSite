<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PV;
class PVController extends Controller
{
    public function index()
    {
        $index    = 0;
        $temp     = Array();
        $humidity = Array();
        $Irr      = Array();
        $Vmp      = Array();
        $Imp      = Array();
        $Voltage  = Array();
        $Current  = Array();
        $Power    = Array();
        $Status   = Array();
        $Lat      = Array();
        $Lng      = Array();
        $time     = Array();
        $num=30;
        while(($num++)<60)
        {

            $PV=PV::where('deviceId',$num)->first();
            array_push($temp,$PV['Temp']);
            array_push($humidity, $PV['Humidity']);
            array_push($Irr,$PV['Irr']);
            array_push($Vmp ,$PV['Vmp']);
            array_push($Imp, $PV['Imp']);
            array_push($Voltage,$PV['Voltage']);
            array_push($Current, $PV['Current']);
            array_push($Power,$PV['Power']);
            array_push($Status, $PV['Status']);
            array_push($Lat, $PV['Lat']);
            array_push($Lng, $PV['Lng']);
            array_push($time, $PV['Time']);
        }
        return response()->json(array('temp'=> $temp,'Humidity'=> $humidity,'Irr'=> $Irr,'time'=>$time), 200);
    }
    public function post(Request $request)
    {
        dd($request->all());
    }
}
