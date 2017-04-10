<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registro;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use PDF;

class ClientReportesController extends Controller
{
    use AuthenticatesUsers;
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function registroIndex()
    {
        $registros = Registro::where('destinatario', Auth::user()->empresa)
                        ->orderBy('fecha_descarga','desc')
                        ->paginate(15);
        return view('clientes/registroCompras')->with('registros', $registros);
    }
    
     public function reportesIndex()
    {        
        return view('aplication/reportes/clientes');
    }
    
    public function mes() 
    {
        $date1 = getdate();
        $mesActual = $date1['year']."-".$date1['mon']."-01";
        $mesSiguiente = $date1['year']."-".($date1['mon']+1)."-01";

        $registro = Registro::whereBetween('fecha_descarga',[$mesActual,$mesSiguiente])
                        ->orderBy('fecha_descarga','desc')
                        ->where('destinatario', Auth::user()->empresa)
                        ->get();
        
        foreach($registro as $n) { 
            $fecha =  explode("-", $n->fecha_descarga);
            $año = substr($fecha[0], 2);
            $n->fecha_descarga =  $fecha[2] ."-".conseguirMesMin($fecha[1]) . "-" . $año;
        }

        $mes = conseguirMes($date1['mon']) . " - " . $date1['year'];
        
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
            
        $registros = Registro::whereBetween('fecha_descarga',[$fecha1,$fecha2])
                        ->where('destinatario' , Auth::user()->empresa)
                        ->orderBy('fecha_descarga','desc')
                        ->get();
        
        foreach($registros as $n) { 
            $fecha =  explode("-", $n->fecha_descarga);
            $año = substr($fecha[0], 2);
            $n->fecha_descarga =  $fecha[2] ."-".conseguirMesMin($fecha[1]) . "-" . $año;
        }
        
        $pdf = PDF::loadView('aplication/PDF/parametro',['registros' => $registros, 'fecha1' => $fecha1, 'fecha2' => $fecha2]);
        return $pdf->stream('Amerigas-RegistroVentas-Periodo: '.$fecha1."/".$fecha2.'.pdf');                   
        
        
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
