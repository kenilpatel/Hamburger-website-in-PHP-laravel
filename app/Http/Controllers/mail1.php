<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\shop;
use App\message_list;
class mail1 extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $email=request('cemail');
        $sub=request('csub');
        $message=request('amsg'); 
        $msgfromuser=request('cmsg');  
        DB::update("update `message_lists` set status='?' where email='?' and subject='?' and message='?'",["read",$email,$sub,$msgfromuser]); 
        $to_name = '';
        $to_email =$email;
        $data = array('name'=>"", "body" => $message);
            
        Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject("Message from ibras admin");
            $message->from('ibrashamburgers@gmail.com','Ibras hamburgers');
        }); 
        session_start();
        $_SESSION["sentmail"]=0;
        $forms = message_list::all()->toArray();
        $count  = count($forms); 
        $forms1 = shop::all()->toArray();
        return view("messages.index")->with('forms',$forms)->with('forms1',$forms1);
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
