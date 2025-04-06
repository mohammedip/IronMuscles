<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Coach;
use App\Models\Adherent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $adherentCount=Adherent::count();
        $coachCount=Coach::count();
        $experienceYear=Carbon::now()->year - 2008;

        return view('pages/home',compact('adherentCount','coachCount','experienceYear'));
    }
}
