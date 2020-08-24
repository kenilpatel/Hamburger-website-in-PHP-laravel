<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hamburger;
use DB;
class updateburger extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        ob_start();
        session_start(); 
        $bid=""; 
        $namep=request("fname");
        $btp=request("bt");
        $rpp=request("rp");
        $bpp=request("pburger");
        $filep=$_FILES["fileToUpload"]["name"]; 
        $forms = hamburger::orderBy('burgerid','DESC')->take(1)->get();
        if(count($forms)!=0)
        {
        	$bid=$forms[0]['burgerid'];
        	$bid=$bid+1;
        }
        else
        {
        	$bid=1;
        }
        if($filep!="")
        {
            $target_dir = "resources/";
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
            $file=$target_file;   
            if (file_exists($target_file)) 
            {
                $message="Sorry, file already exists.";
                $uploadOk = 0;
            }  
            else
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                {
                    $message="Data updated successfully";
                } 
                else 
                {
                    $message="Sorry, there was an error uploading your file.";
                    $uploadOk = 0;
                }
            }
        } 
        $total_sold=0;
         DB::insert('insert into hamburgers(shopid,name,photo,bread_type,recipies,total_sold,price,burgerid) values(?,?,?,?,?,?,?,?)',['1',$namep,$target_file,$btp,$rpp,$total_sold,$bpp,$bid]);  
        $_SESSION["message"] = "Data added successfully";
      return redirect("/menu"); 
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
    public function update(Request $request, $id=0)
    { 
        $bid=request('bid'); 
        $namep=request('fname');
        $btp=request('bt');
        $rpp=request('rp');
        $bpp=request("pburger");
        $filep=$_FILES["fileToUpload"]["name"]; 
        $message="";
        $name="";
        $name="";
        $bt="";
        $rp="";
        $bp="";
        $file="";  
        $u = hamburger::where("burgerid","=",$bid)->get(); 
        $name=$u[0]["name"];
        $bt=$u[0]["bread_type"];
        $rp=$u[0]["recipies"];
        $bp=$u[0]["price"];
        $file=$u[0]["photo"]; 
        if($filep!="")
        {
            $target_dir = "resources/";
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); 
            $file=$target_file; 
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) 
            {
                 
                $uploadOk = 1;
            } else 
            {
                $message="File is not an image.";
                $uploadOk = 0;
            } 
            if (file_exists($target_file)) 
            {
                $message="Sorry, file already exists.";
                $uploadOk = 0;
            }  
            else
            {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
                {
                    $message="Data updated successfully";
                } 
                else 
                {
                    $message="Sorry, there was an error uploading your file.";
                }
            }
        }
        if($namep!="")
        {
            $name=$namep;
            $message="Data updated successfully";
        }
        if($btp!="")
        {
            $bt=$btp;
            $message="Data updated successfully";
        }
        if($rpp!="")
        {
            $rp=$rpp;
            $message="Data updated successfully";
        }
        if($bpp!="")
        {
            $bp=$bpp;
            $message="Data updated successfully";
        }
        echo $name."<br>";
        echo $file."<br>";
        echo $bt."<br>";
        echo $rp."<br>";
        echo $bp."<br>";
        echo $bid."<br>";
        DB::update('update hamburgers set name = ?,photo=?,bread_type=?,recipies=?,price=? where burgerid = ?',[$name,$file,$bt,$rp,$bp,$bid]); 
        session_start();
        $_SESSION["message"] = $message;
      return redirect("/menu");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0)
    {
        $bid=request('bid'); 
        session_start();
        $_SESSION["message"] = "Burger Deleted successfully";
         
       DB::delete('delete from hamburgers where burgerid = ?',[$bid]);
       return redirect("/menu");
    }
}
