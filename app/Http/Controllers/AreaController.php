<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function createStateOrCity(){

        $states = State::all();

        return view('area.create', [
            'states' => $states
        ]);
    }

    public function areaList(){
        return view('area.index');
    }

    public function stateStore(Request $request){
        $state_name = $request->input('state_name');

        $state = new State();
        $state->name = $state_name;

        $state->save();

        return redirect()->route('area.index');

    }

    public function cityStore(Request $request){
        $city_name = $request->input('city_name');
        $state = $request->input('state');

        $city = new City();
        $city->name = $city_name;
        $city->state()->associate($state);
        $city->save();

        return redirect()->route('area.index');
    }
}
