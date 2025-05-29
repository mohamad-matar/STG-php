<?php

use App\Models\Image;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

if (!function_exists('saveImg')) {
    function saveImg($type, $file)
    {
        // $filename = $file->store("images/$type", 'public');
        $filename = Storage::disk('public')->putFile("images/$type", $file);
        return Image::create([
            'name' => $filename,
            'type' => $type,
        ])->id;
    }
}

if (!function_exists('getImgUrl')) {
    function getImgUrl($id)
    {
        $imageRec = Image::find($id);
        // dd($imageRec);
        return  $imageRec ? "/storage/$imageRec->name" : "/storage/no-image.png";
    }
}

if (!function_exists('getValue')) {
    function getValue($key_en)
    {
        return Setting::where('key_en', $key_en)->first()->value_en;
    }
}
