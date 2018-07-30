<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostTestController extends Controller
{
    public function index()
    {
        return view ('posttest.postest');
    }
    
    public function postTest1()
    {
        return view ('posttest.postest1');
    }
}
