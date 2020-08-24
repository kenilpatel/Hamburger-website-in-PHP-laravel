<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use DB;
use Mail;
use Illuminate\Support\Facades\Validator; 
class register extends Controller
{
    //
    public function index(Request $request)
    { 
    	 ob_start(); 
		session_start();
		$name=$request->input('name');
		$mail1=$request->input('mail');
		$pwd1=$request->input('pwd1');
	    $pwd2=$request->input('pwd2');
		$address=$request->input('address');  
		$validate=Validator::make($request->all(),[
            'name'=>'required',
            'mail'=>'required',
            'pwd1'=>'required',
            'pwd2'=>'required',
            'address'=>'required'
            ]);
        if($validate->fails())
        {
            $_SESSION["message"]="Please fill all the fields";  
            return redirect("/inicio");
        } 
        $validate1=Validator::make($request->all(),[ 
            'pwd1'=>'same:pwd2', 
            ]);
        if($validate1->fails())
        {
            $_SESSION["message"]="Please enter same password in both fields";  
            return redirect("/inicio");
        }
        $validate2=Validator::make($request->all(),[ 
            'pwd1'=>'min:8|max:10', 
            ]);
        if($validate2->fails())
        {
            $_SESSION["message"]="Please should be between 8 to 10 length";  
            return redirect("/inicio");
        }
        $validate3=Validator::make($request->all(),[ 
            'mail'=>'email', 
            ]);
        if($validate3->fails())
        {
            $_SESSION["message"]="Please enter proper email address";  
            return redirect("/inicio");
        }
	        
	    try
	    { 
	        $u = customer::where('email',"=",$mail1)->get(); 
			$nr=count($u);
	        if($nr!=0)
	        {
	            $_SESSION["message"]="User with same email address already registered";
	            return redirect("/inicio"); 
	        }
	        else
	        {  
	            $u = customer::where('username',"=",$name)->get(); 
				$nr=count($u); 
	            if($nr!=0)
	            {
	                $_SESSION["message"]="User with same username address already registered";
	                 return redirect("/inicio");
	            }
	            else
	            {
	                
	                $_SESSION["message"]="Registration done successfully"; 
	                $Body="$name Thank you so much for your registration with ibras hamburgers now you can login to the website and order hamburgers";
	                // mail($mail1,"Thank you for registration..",$Body); 
	                $to_name = '';
					$to_email =$mail1;
					$data = array('name'=>"", "body" => $Body);
					    
					Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
					    $message->to($to_email, $to_name)
					            ->subject('Thanks for registration');
					    $message->from('ibrashamburgers@gmail.com','Ibras hamburgers');
					});
	                // DB::insert('insert into customers values(?,?,?,?)',[$name,$pwd1,$address,$mail1]);
	               $form= new customer();
                   $form->username=$name;
                    $form->password=$pwd1;
                    $form->address=$address;
                    $form->email=$mail1;
                    $form->save();
	                $_SESSION['message']="Registration successfully done"; 
	                 return redirect("/inicio");
	            }
	        }
	    }
	    catch(Exception $e)
	    {
	        echo $e->getMessage();
	        $_SESSION['message']="Please enter proper email address"; 
	        return redirect("/inicio");
	    }
	                 
	    
		 return redirect("/inicio");
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
