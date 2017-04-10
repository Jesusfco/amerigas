<br><br><div id="panel">
    <br>
    <div id="panelMargen">        

        @if(Auth::user()->level < 2)
        <h4><span class="glyphicon glyphicon-user" aria-hidden="true" id="chess"></span>
            Cliente                            
       </h4>
        <hr>
        <ul>            
            <a href="{{ url('cliente/registros')}}"><li>
                    <span class="glyphicon glyphicon-list-alt"  aria-hidden="true" ></span>
                    Registros de Compras
                </li>
            </a>                       
            <a href="{{ url('cliente/reportes')}}"><li>
                    <span class="glyphicon glyphicon-print"  aria-hidden="true" ></span> 
                    Reportes PDF
                </li>
            </a> 

        </ul>
        @else
       <h4><span class="glyphicon glyphicon-user" aria-hidden="true" id="chess"></span>
           Administrador                            
       </h4>
        <hr>
        <ul>
            <a href="{{ route('registros.create')}}"><li>
                    <span class="glyphicon glyphicon-shopping-cart"  aria-hidden="true" ></span>
                    Registrar Venta
                </li>
            </a>
            <a href="{{ url('admin/registros')}}"><li>
                    <span class="glyphicon glyphicon-list-alt"  aria-hidden="true" ></span>
                    Registros
                </li>
            </a>
            <a href="{{ url('admin/clientes')}}"><li>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    Clientes
                </li>
            </a>

            <a href="{{ url('register')}}"><li>
                    <span class="glyphicon glyphicon-plus"  aria-hidden="true" ></span> 
                    Nuevo Cliente
                </li>
            </a>  
            <a href="{{ url('admin/reportes')}}"><li>
                    <span class="glyphicon glyphicon-print"  aria-hidden="true" ></span> 
                    Reportes
                </li>
            </a> 

        </ul>
        
        <hr>

        <h4><span class="glyphicon glyphicon-cog" aria-hidden="true" id="chess"></span>
            Ajustes 
        </h4>
            <ul>
                <a href="{{ url('admin/contraseñas')}}"><li>
                        <span class="glyphicon glyphicon-sunglasses"></span>
                        Contraseñas
                    </li>
                </a>            
            </ul>
        @endif
        

    </div>
</div>
