<?php

namespace App\Http\Controllers\Tourists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index (){
        return view('home.index');
    }
}
