<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LangController extends Controller
{
    function lang(Request $request){
        $lang = $request->lang;
        app()->setlocale($lang);
        $langCookie = Cookie::make('lang', $lang, 60 * 24 * 365); // 1 year by minute 
        return back()->withCookie($langCookie);
    }
}
