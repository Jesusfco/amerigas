<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(Request $request)
    {
        if($request->search == null) {
            $clientes = User::where('level', '=', '0')
                ->paginate(15);

            return view('aplication/clientes/index')->with(['clientes' => $clientes]);
        }
        else { 
            $clientes = User::where('empresa', 'LIKE' , "%$request->search%")
                ->orWhere('name', 'LIKE' , "%$request->search%")
                ->orWhere('email', 'LIKE' , "%$request->search%")
                ->paginate(15);        
            return view('aplication/clientes/index')->with(['clientes' => $clientes]);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        //
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = User::where('id', '=', $id)->first();                    
        return view('aplication/clientes/edit')->with(['cliente' => $cliente]);
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
        User::where('id', $id)
            ->update(['empresa' => $request->empresa,
                        'email' => $request->email,
                        'name' => $request->name,
                        'direccion' => $request->direccion,
                        'RFC' => $request->RFC,
                        'tel1' => $request->tel1,
                        'tel2' => $request->tel2,
                        'cel1' => $request->cel1,
                        'cel2' => $request->cel2,
                //            'password' => bcrypt($data['password']),
//                        'password' => bcrypt('prueba'),
                    ]); 
        return back()->with(['msj'=>'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drop(Request $request)
    {
        User::where('id', $request->id)->delete();
        echo 'succes';
    }
    
    public function search(Request $request) 
    { 
        $sugest = User::where('empresa', "%$request%")
//                    ->select('empresa')
                    ->orderBy("empresa", "desc")
                    ->take(5)
                    ->get();
        $results= [];
        foreach($sugest as $n){
           $results[]= ['value' => $n->empresa];
        }
        
        return response()->json($results);
    }
    
    public function contraseñas(Request $request) 
    { 
        if($request->search == null) {
            $usuarios = User::select('name','email','empresa','id')
                            ->paginate(20);
            return view('aplication/clientes/contrasenas')->with(['usuarios' => $usuarios]);
        } else { 
            $usuarios = User::select('name','email','empresa','id')
                            ->where('empresa', 'LIKE' , "%$request->search%")
                            ->orWhere('name', 'LIKE' , "%$request->search%")
                            ->orWhere('email', 'LIKE' , "%$request->search%")
                            ->paginate(20);
            return view('aplication/clientes/contrasenas')->with(['usuarios' => $usuarios]);
        }
    }
    
    public function restablecerContraseñas(Request $request) { 
        $contraseña = $request->contrasena;
        $id = $request->id;
         $user = User::find($id);
         $user->password = bcrypt($contraseña);
         $user->save();
        return $user->empresa;
    }
}



