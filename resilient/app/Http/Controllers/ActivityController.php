<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function index()
    {
    	return view('admin.Actividades');
    }

    public function yourCharacter()
    {
    	return view('admin.Actividades2');
    }
}