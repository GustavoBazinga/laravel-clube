<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public static function image(string $path){
        $path = storage_path('app/public/' . $path);
        return response()->file($path);
    }
}
