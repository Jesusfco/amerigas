<!DOCTYPE html>
<html lang="en">
<head>
    <!--<meta charset="UTF-8">-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Reporte {{$fecha1}} / {{$fecha2}}</title>
    <link rel="icon"  href="images/icon/amerigasIcon.ico">
</head>
<body>
    <div>
        <div class="logoContainer">
            <img src="Images/amerigas.png" style="margin-top: 0px; width: 150px;">
        </div>
        <div class="marca">
            <h3>AMERIGAS PROPANE LP SA DE CV</h3>
            <h5>RFC: APL040619PF6</h5>
        </div>
    </div>
    <br>
    <div>
        
        <h4 style="text-align: center">PERIODO {{$fecha1}} / {{$fecha2}}</h4>
        
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>FECHA</th>
                    <th>PRODUCTO</th>
                    <th>VOLUMEN	EN LITROS</th>
                    <th>LUGAR DE DESCARGA</th>
                    <th>CLIENTE</th>
                    <th>CONFIRMACION DIGITAL DE ENTREGA</th>
                </tr>
            </thead>
            <tbody>
                 <?php  $num=1; ?>
                @foreach($registros as $n)
                <tr>
                    <td>{{$num}}</td>
                    <td>{{$n->fecha_descarga}}</td>
                    <td>{{$n->producto}}</td>
                    <td>{{$n->volumen}}</td>
                    <td>{{$n->lugar}}</td>
                    <td>{{$n->destinatario}}</td>
                    <td>ENTREGADO</td>
                </tr>
                <?php  $num++; ?>
               @endforeach

            </tbody>
        </table>
    </div>

    
    <style>
         * {     
            padding: 0;
            margin: 6px;
            font-family: sans-serif;
        }
        .marca { 
            text-align: right;
            display: inline-block;
            width: 75%;
            /*float: right;*/
        }
        .logoContainer { 
            display: inline-block;
        }
        
        .marca h2 { 
            margin: 0;
        }
        .marca h3 { 
            margin: 0;
        }
        
        
        
        .cliente h3 { 
            display: inline-block;
            margin-left: 50px;
            margin-top: -5px;
            padding: 0 30px 0 30px;
            border-bottom: 2px solid #000000;
            
        }
        .cliente h2 { 
            display: inline-block;
        }
        
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 11px;
            border: 1;
        }

        th, td {
            text-align: center;
            padding: 2px 8px 2px 8px;
            border-bottom: 1px solid;
        }
        th {
            background-color: #789;
            color: white;            
        }
        tr:nth-child(even){background-color: #f2f2f2}
    </style>
</body>
</html>
