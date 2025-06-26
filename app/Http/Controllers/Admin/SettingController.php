<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    function index()
    {
        $settings = Setting::all();
        // return $settings;

        return view('dashboard.settings.index', compact('settings'));
    }

    function update(Setting $setting, Request $request)
    {
        $setting->value =  $request->value;
        $setting->save();

        return back()->with(['success' => "تم تعديل $setting->key بنجاح"]);
    }
}
