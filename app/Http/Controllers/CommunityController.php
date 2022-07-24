<?php

namespace App\Http\Controllers;

use App\Models\Community;
use Illuminate\Http\Request;

class CommunityController extends Controller
{
    public function index(){
        $community = Community::all();

        return view('community.index', [
            'communities' => $community
        ]);
    }
}
