<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop;
class editpassword_user_controller extends Controller
{
    public function index()
    {
        //
         $forms1 = shop::all()->toArray();
        return view("editpassword_user.index")->with('forms1',$forms1);
    }
}
