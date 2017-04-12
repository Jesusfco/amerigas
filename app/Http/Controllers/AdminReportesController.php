<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Registro;
use App\User;
use PDF;

class AdminReportesController extends Controller
{
      public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index() {
        $empresas = User::select('empresa')
                    ->where('level',0)
                    ->get();
        return view('aplication/reportes/admin')->with('empresas' , $empresas);
    }
    
    public function actualMes() { 
        $date1 = getdate();
        $mesActual = $date1['year']."-".$date1['mon']."-01";
        $mesSiguiente = $date1['year']."-".($date1['mon']+1)."-01";

        $registro = Registro::whereBetween('fecha_descarga',[$mesActual,$mesSiguiente])
                        ->orderBy('fecha_descarga','desc')
                        ->get();
        
        foreach($registro as $n) { 
            $fecha =  explode("-", $n->fecha_descarga);
            $año = substr($fecha[0], 2);
            $n->fecha_descarga =  $fecha[2] ."-".conseguirMesMin($fecha[1]) . "-" . $año;
        }

        $mes = conseguirMes($date1['mon']) . " - " . $date1['year'];
        cantidades($registro);

        $pdf = PDF::loadView('aplication/PDF/mes',['registros' => $registro,'mes'=> $mes]);
        return $pdf->stream('Amerigas-RegistroVentas Mes: '.$date1["mon"]."-".$date1["year"].'.pdf');
    }
    
    public function parametro(Request $request)
    {
        $this->validate($request, [
            'date1' => 'required',            
            'date2' => 'required'            
        ]);
        
        $fecha1 =  $request->date1;
        $fecha2 =  $request->date2;
        if($request->empresa == 'TODOS') {
            
            $registros = Registro::whereBetween('fecha_descarga',[$fecha1,$fecha2])
                        ->orderBy('fecha_descarga','desc')
                        ->get();
            foreach($registros as $n) { 
                $fecha =  explode("-", $n->fecha_descarga);
                $año = substr($fecha[0], 2);
                $n->fecha_descarga =  $fecha[2] ."-".conseguirMesMin($fecha[1]) . "-" . $año;
            }

            cantidades($registros);

            $pdf = PDF::loadView('aplication/PDF/parametro',['registros' => $registros, 'fecha1' => $fecha1, 'fecha2' => $fecha2]);
            return $pdf->stream('Amerigas-RegistroVentas-Periodo: '.$fecha1."/".$fecha2.'.pdf');
            
        } else {
            
            $usuario = User::where('empresa', '=' , $request->empresa)->first();
            
            if($usuario == null) { 
                return back()->withInput(Input::except('empresa'))->with('error1','error');
            }
            
            $registros = Registro::whereBetween('fecha_descarga',[$fecha1,$fecha2])
                            ->where('destinatario', '=', $request->empresa)
                            ->orderBy('fecha_descarga','desc')
                            ->get();
            
            foreach($registros as $n) { 
                $fecha =  explode("-", $n->fecha_descarga);
                $año = substr($fecha[0], 2);
                $n->fecha_descarga =  $fecha[2] ."-".conseguirMesMin($fecha[1]) . "-" . $año;
            }

            cantidades($registros);
            
            $pdf = PDF::loadView('aplication/PDF/client',['registros' => $registros,
                                                          'fecha1' => $fecha1, 
                                                          'fecha2' => $fecha2,
                                                           'cliente' => $request->empresa]);
            return $pdf->stream('Amerigas-RegistroVentas-Cliente: '.$request->empresa."Periodo:".$fecha1."/".$fecha2.'.pdf');
        }
        
        
    }        
        
}

function conseguirMes($mes) { 
    switch ($mes){
        case '1':
            return 'ENERO';
        case '2':
            return 'FEBRERO';
        case '3':
            return 'MARZO';
        case '4':
            return 'ABRIL';
        case '5':
            return 'MAYO';
        case '6':
            return 'JUNIO';
        case '7':
            return 'JULIO';
        case '8':
            return 'AGOSTO';
        case '9':
            return 'SEPTIEMBRE';
        case '10':
            return 'OCTUBRE';
        case '11':
            return 'NOVIEMBRE';
        case '12':
            return 'DICIEMBRE';
        
    }
}

function conseguirMesMin($mes) { 
    switch ($mes){
        case '1':
            return 'ENE';
        case '2':
            return 'FEB';
        case '3':
            return 'MAR';
        case '4':
            return 'ABR';
        case '5':
            return 'MAY';
        case '6':
            return 'JUN';
        case '7':
            return 'JUL';
        case '8':
            return 'AGO';
        case '9':
            return 'SEP';
        case '10':
            return 'OCT';
        case '11':
            return 'NOV';
        case '12':
            return 'DIC';
        
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
