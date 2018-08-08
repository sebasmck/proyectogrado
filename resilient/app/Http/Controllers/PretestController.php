<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PretestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pretest.pretest');
    }

    // start sequencer

    public function pretest1(){

        return view('pretest.pretest1');

    }

    public function pretest2(){

        return view('pretest.pretest2');

    }

    public function pretest3(){

        return view('pretest.pretest3');

    }
    
    public function pretest4(){

        return view('pretest.pretest4');

    }

     public function pretest5(){

        return view('pretest.pretest5');

    }
    
    public function pretestPrueba(){
        return view ('pretest.pretestprueba');
    }

    public function pretestPrueba1(){
        return view ('pretest.pretestprueba1');
    }

    public function pretestPrueba2(){
        return view('pretest.pretestprueba2');
    }

    public function pretestPrueba3(){
        return view('pretest.pretestprueba3');
    }

    public function pretestPrueba4(){
        return view('pretest.pretestprueba4');
    }
    
    public function pretestPrueba5(){
        return view('pretest.pretestprueba5');
    }

    public function pretestPrueba6(){
        return view('pretest.pretestprueba6');
    }

    public function pretestPrueba7(){
        return view('pretest.pretestprueba7');
    }


    public function pretestPrueba8(){
        return view('pretest.pretestprueba8');
    }

    public function pretestPrueba9(){
        return view('pretest.pretestprueba9');
    }

    public function pretestPrueba10(){
        return view('pretest.pretestprueba10');
    }

    public function pretestPrueba11(){
        return view('pretest.pretestprueba11');
    }
    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
