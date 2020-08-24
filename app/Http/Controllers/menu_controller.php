<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hamburger; 
use App\shop;
class menu_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $f = hamburger::orderBy('total_sold','DESC')->get();
         $count  = count($f); 
         $count=$count-4;
        $forms11 = hamburger::orderBy('total_sold','DESC')->get()->reverse();
        $forms11=$forms11->take($count);
        $forms11=$forms11->reverse();
        $forms1 = shop::all()->toArray();
         $forms = hamburger::orderBy('total_sold','DESC')->take(4)->get(); 
        return view("menu.index")->with('forms',$forms)->with('forms1',$forms1)->with('forms11',$forms11);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
