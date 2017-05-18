<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curriculum;
use App\Producto;

class IndexController extends Controller
{
    public function index() { 
        $productos = Producto::select('producto', 'descripcion', 'img')->get();
        $historias = Curriculum::select('id','fecha' , 'descripcion', 'img')->get();                
        return view('index/index')->with(['productos' =>$productos, 'historias' => $historias]);        
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
        $_message = $request->mensaje;
        $_email = $request->correo;
        $_name = $request->nombre;


        $_toSend = "Nombre: " . $_name . "\nE-mail: " . $_email . "\n\nMensaje:\n" . $_message;
        //$to = "jfcr@live.com";
        $to = "ventasamerigas@gmail.com";
        $subject = "Cliente: " . $_name . " - " . $_email;
        $headers = "From: $_email" . "\r\n" .
            "CC: " . $_email;


        if (mail($to, $subject, $_toSend, $headers)) {
            echo true;
        } else {
            return false;
        }


    }

    public function findCurriculum(Request $request){

        return Curriculum::find($request->id);
    }
}

