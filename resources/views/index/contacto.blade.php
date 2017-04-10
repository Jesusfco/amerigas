<div id="contacto">
    <br><br><br>
    <h2 class="fat center">Contacto</h2>
    <div class="container row">
        <p class="center">Contactese con nosotros y lo ayudaremos a realizar su proyecto.</p>
        <form method="POST" onsubmit="return enviar()">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
            <input id="correo" type="email" placeholder="Correo Electronico"  name="correo" required>
            <input id="nombre" type="text" placeholder="Tu nombre" name="nombre" required>
            {{ csrf_field() }}
            <textarea id="mensaje" name="mensaje" placeholder="Escribe tu mensaje" required></textarea>
            <br><br>
            <center>
                <button class="btn blue darken-4 " type="submit" name="action">Enviar Mensaje
                <i class="material-icons right">send</i>
                </button>
            </center>
            
            </div>
        </form>
    <br><br><br>
</div>
</div>
    