<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubeXController extends Controller
{
    public function index()
    {
        return view('clubex.index');
    }
    
}
