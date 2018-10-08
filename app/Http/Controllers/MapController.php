<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Client;
use App\Models\ClientCoordinate;

class MapController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        $clients = Client::all();
        return view('index')
            ->with('countries',$countries)
            ->with('clients',$clients);
    }

    public function getCoords($id){
        $coordinates = ClientCoordinate::where('client_id',$id)->whereDate('created_at', '=', date('Y-m-d'))->get();
        return response()->json($coordinates);
    }
}
