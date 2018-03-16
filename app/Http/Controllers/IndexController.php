<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\Producto;
use App\Mail\ContactMail;
use Mail;

class IndexController extends Controller
{
    public function index() { 
        $productos = Producto::select('producto', 'descripcion', 'img')->get();
        $historias = Curriculum::select('id','fecha' , 'descripcion', 'img')->get();                
        return view('index/index')->with(['productos' => $productos, 'historias' => $historias]);
    }
    
    public function eng() { 
        $productos = Producto::select('product', 'descripcionEng', 'img')->get();
        $historias = Curriculum::select('id','fechaEng' , 'descripcionEng', 'img')->get();                
        return view('index/indexEng/index')->with(['productos' =>$productos, 'historias' => $historias]);        
    }
    
    public function mov() { 
        $productos = Producto::select('producto', 'descripcion', 'img')->get();
        $historias = Curriculum::select('id','fecha' , 'descripcion', 'img')->get();               
        return view('index/index')->with(['productos' =>$productos, 'historias' => $historias , 'mov' => true]);        
    }
    public function movEng() { 
        $productos = Producto::select('product', 'descripcionEng', 'img')->get();
        $historias = Curriculum::select('id','fechaEng' , 'descripcionEng', 'img')->get();
        return view('index/indexEng/index')->with(['productos' =>$productos, 'historias' => $historias , 'mov' => true]);        
    }
    
    public function message(Request $request) 
    {        
        Mail::send(new ContactMail());

        // Mail::send(['text' => 'mail'], ['name', 'JESUS RODRIGUEZ'], function($message){
			// 	$message->to('jfcr@live.com', 'TO Bitfumes')->subject('TEST EMAIL');
			// 	$message->from('rodriguez@amerigas.mx', 'Rodriguez');

			// 	$message->to('rodriguez@amerigas.mx', 'TO Bitfumes')->subject('TEST EMAIL');
			// 	$message->from('rodriguez@amerigas.mx', 'Rodriguez');
			// });

			return 'true';


        // if (mail($to, $subject, $_toSend, $headers)) {
        //     echo true;
        // } else {
        //     return false;
        // }


    }
    public function findCurriculum(Request $request){

        return Curriculum::find($request->id);
    }
}

