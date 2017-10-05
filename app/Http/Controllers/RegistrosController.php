<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Registro;
use Illuminate\Support\Facades\Input;

class RegistrosController extends Controller
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
        $users = User::select('empresa')
                    ->where('level', 0)
                    ->get();

        if ($request->search == NULL) {
            $registros = Registro::select('user_id' ,'fecha_descarga','volumen' ,'producto','id', 'medida')
                        ->orderBy('fecha_descarga','desc')
                        ->paginate(15);

            foreach($registros as $x){
                $x->destinatario = (User::find($x->user_id))->empresa;
            }

            cantidades($registros);

        } else {

            $search = User::where('empresa', $request->search)->first();

            $registros = Registro::select('user_id' ,'fecha_descarga','volumen' ,'producto','id', 'medida')
                        ->where('user_id', $search->id)
                        ->orderBy('fecha_descarga','desc')
                        ->paginate(20);

            foreach($registros as $x){
                $x->destinatario = (User::find($x->user_id))->empresa;
            }

            cantidades($registros);
        }

        return view('aplication/registros/index')->with(['registros' => $registros, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $empresa = User::select('empresa')
                    ->where('level', 0)
                    ->get();
        return view('aplication/registros/create')->with('empresas', $empresa);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario = User::where('empresa', '=' , $request->empresa)->first();
        if($usuario == null) { 
            return back()->withInput(Input::except('empresa'))->with('error1','error');
        }
        
        $this->validate($request, [
            'date' => 'required',
            'volumen' => 'required',
            'producto' => 'required',
            'empresa' => 'required',
            'lugar' => 'required',
            'recibe' => 'required',
            'entrega' => 'required',
            'medida' => 'required',
        ]);

        $user = User::where('empresa', $request->empresa)->first();
        
        $registro = new Registro();
        
        $registro->volumen = $request->volumen;
        $registro->fecha_descarga = $request->date;
        $registro->producto = $request->producto;
        $registro->user_id = $user->id;
        $registro->lugar = $request->lugar;
        $registro->recibe = $request->recibe;
        $registro->entrega = $request->entrega;
        $registro->hora_camion = $request->hora_camion;
        $registro->hora_descarga = $request->hora_descarga;
        $registro->remitente = $request->remitente;
        $registro->medida = $request->medida;
        $registro->save();
        
        return back()->with('msj' , 1);
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
        $reporte= Registro::find($id);
        $empresa = User::select('empresa')
                    ->where('level', 0)
                    ->get();
        return view('aplication/registros/edit')->with(['empresas' => $empresa, 'reporte' => $reporte]); 
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
        $usuario = User::where('empresa', '=' , $request->empresa)->first();
        if($usuario == null) { 
            return back()->withInput(Input::except('empresa'))->with('error1','error');
        }
        
        $this->validate($request, [
            'date' => 'required',
            'volumen' => 'required',
            'producto' => 'required',
            'empresa' => 'required',
            'lugar' => 'required',
            'receptor' => 'required',
            'repartidor' => 'required',
        ]);

        $user = User::where('empresa', $request->empresa)->first();

        Registro::find($id)
                ->update(['volumen' => $request->volumen,
                        'fecha_descarga' => $request->date,
                        'producto' => $request->producto,
                        'destinatario' => $request->empresa,
                        'lugar' => $request->lugar,
                        'receptor' => $request->receptor,
                        'repartidor' => $request->repartidor,
                        'hora_camion' => $request->hora_camion,
                        'hora_descarga' => $request->hora_descarga,
                        'remitente' => $request->remitente,
                        'medida' => $request->medida]);
        
        return back()->with('msj' , 1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function drop(Request $request)
    {
        Registro::where('id', $request->id)->delete();
        echo 'succes';
    }
}

function cantidades($volumen) {
    foreach($volumen as $n) {
        if($n->volumen >=1000) {
            $nuevo = NULL;
            $pos = strpos($n->volumen, '.');

            if($pos) {

                $variable = $n->volumen;

                $decimales = explode(".", $variable);
                $moment = str_split($decimales[0]);
                $x = count($moment);
                if ($variable < 1000000) {
                    for ($z = 0; $z <= count($moment) - 1; $z++) {

                        if ($x -3 == $z) {

                            $nuevo .=  ',';
                        }
                        $nuevo .= $moment[$z];
                    }
                }
                else {
                    for ($z = 0; $z <= count($moment) - 1; $z++) {

                        if ($x - 3  == $z) {
                            $nuevo = $nuevo . ',';
                        }    if ($x - 6  == $z) {
                            $nuevo = $nuevo . '´';
                        }
                        $nuevo = $nuevo . $moment[$z];
                    }
                }
                $nuevo = $nuevo . "."  . $decimales[1];

            } else {
                $variable = $n->volumen;
                $moment = str_split($n->volumen);
                $x = count($moment);

                if ($variable < 1000000) {
                    for ($z = 0; $z <= count($moment) - 1; $z++) {

                        if ($x - 3 == $z) {

                            $nuevo .=  ',';
                        }
                        $nuevo .= $moment[$z];
                    }
                }
                else {
                    for ($z = 0; $z <= count($moment) - 1; $z++) {

                        if ($x - 3 == $z) {
                            $nuevo = $nuevo . ',';
                        } else if ($x - 6 == $z) {
                            $nuevo = $nuevo . '´';
                        }
                        $nuevo = $nuevo . $moment[$z];
                    }
                }
            }

             $n->volumen = $nuevo;
        }
    }
}
