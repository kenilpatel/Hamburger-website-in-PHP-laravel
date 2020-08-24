<?php

use Illuminate\Support\Facades\Route;
use App\Mail\mail;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/email',function(){
	return new mail();
});

Route::resource('/inicio','inicio_controller'); 
Route::get('/inicio.index','inicio_controller@index');

Route::resource('/footer','footer_controller'); 
Route::get('/footer.index','footer_controller@index');

Route::resource('/Edita','Edita_controller'); 
Route::get('/Edita.index','Edita_controller@index');

Route::resource('/Editu','Editu_controller'); 
Route::get('/Editu.index','Editu_controller@index');

Route::resource('/sessioncheck','Edita_controller'); 
Route::get('/Edita.index','Edita_controller@index');

Route::resource('/sessioncheck','Editu_controller'); 
Route::get('/Editu.index','Editu_controller@index');

Route::resource('/menu','menu_controller'); 
Route::get('/menu.index','menu_controller@index');

Route::resource('/sobre_nosotros','sobre_nosotros_controller');
Route::post('/sobre_nosotros','sobre_nosotros_controller@index');

Route::resource('/updateshop','updateshop');
Route::post('/updateshop','updateshop@update');

Route::resource('/message','messages_controller'); 
Route::get('/message.index','messages_controller@index');

Route::resource('/messages','messages_controller'); 
Route::get('/message.index','messages_controller@index');

Route::resource('/editpassword_admin','editpassword_admin_controller'); 
Route::get('/editpassword_admin.index','editpassword_admin_controller@index');

Route::resource('/editpassword_user','editpassword_user_controller'); 
Route::get('/editpassword_user.index','editpassword_user_controller@index');

Route::resource('/contacto','contacto_controller'); 
Route::get('/contacto.index','contacto_controller@index');

Route::resource('/cart','cart_controller'); 
Route::get('/cart.index','cart_controller@index');
 
// Route::resource('/forgotp','forgotp'); 
// Route::get('/forgotp','forgotp@index'); 

Route::resource('/orderhistory','orderhistory_controller'); 
Route::get('/orderhistory.index','orderhistory_controller@index');

Route::resource('/updateburger','updateburger');
Route::post('/updateburger_edit','updateburger@update');
Route::get('/updateburger_delete','updateburger@destroy');
Route::post('/updateburger_add','updateburger@store');

Route::resource('/changeap','changeap');
Route::post('/changeap','changeap@index'); 

Route::resource('/changeup','changeup');
Route::post('/changeup','changeup@index');

Route::resource('/changeuser','changeuser');
Route::post('/changeuser','changeuser@index'); 

Route::resource('/contactodata','contactodata'); 
Route::post('/contactodata','contactodata@index');

Route::resource('/logout','logout'); 
Route::post('/logout','logout@index');

Route::resource('/Logout','Logout'); 
Route::post('/Logout','Logout@index');

Route::resource('/loginattemp','loginattemp'); 
Route::post('/loginattemp','loginattemp@index');

Route::resource('/addtocart','addtocart'); 
Route::post('/addtocart','addtocart@index');

Route::resource('/deletecart','deletecart'); 
Route::get('/deletecart','deletecart@index');

Route::resource('/userorder','userorder'); 
Route::get('/userorder','userorder@index');

Route::resource('/register','register'); 
Route::post('/register','register@index');

Route::resource('/mail','mail1'); 
Route::post('/mail','mail1@index');

Route::resource('login_form','login_formController');