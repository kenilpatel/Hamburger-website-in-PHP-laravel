<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shop;
use App\order;
class orderhistory_controller extends Controller
{
     public function index()
    { 
        session_start(); 
        function ret_session()
        {
            if(isset($_SESSION['tu']))
            {
                if(strcmp($_SESSION['tu'], "admin")==0)
                {
                    return "admin,".$_SESSION['tn'];
                }   
                elseif(strcmp($_SESSION['tu'], "user")==0)
                {
                    return "user,".$_SESSION['tn'];
                }      
                else 
                {
                    return "na,na";
                }  
            }
            else
            {
                return "na,na";
            }
        }   
        $s=ret_session();
        $user=explode(",",$s);  
        $forms1 = shop::all()->toArray();
        $forms2 = order::where("username","=",$user[1])->get();
        // echo $forms2;
        // echo $forms2[0];
        // echo $forms2[1];
        foreach ($forms2 as $key => $value) 
        {
            // echo $key; 
            // echo $value;
            $dps=array(); 
            $items=$forms2[$key]['items']; 
            // echo $items;
            $burgers=explode(",",$items);
            // print_r($burgers);
            for($i=0;$i<sizeof($burgers)-1;$i++) 
            {   
                // echo $i;
                // echo $burgers[$i];      
                $burgerdetail=explode(":",$burgers[$i]);
                // echo $burgerdetail[0];
                if(strcmp($burgerdetail[0],"")!=0)
                {
                    $in=$burgerdetail[0];
                    $qty=$burgerdetail[1];
                    $price=$burgerdetail[2];
                    $dps[$i]="$in x $qty = $$price"; 
                    // echo "$in x $qty = $$price"."<br>";
                }
                
            }  
            $forms2[$key]["ds"]=$dps; 

        }  
        // echo $forms2;
        return view("orderhistory.index")->with('forms1',$forms1)->with('forms2',$forms2); 
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
