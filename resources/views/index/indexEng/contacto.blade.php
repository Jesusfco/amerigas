<div id="contacto">
    <br><br>
    <h2 class="fat center">Contact</h2>
    <div class="container row">
        <p class="center">Contact with us, and we will help you</p>
        <form method="GET" onsubmit="return enviar()">
            <div class="col s12 m8 offset-m2 l6 offset-l3">
            <input type="email" placeholder="E-mail"  name="correo" required>
            <input type="text" placeholder="Your Name" name="nombre" required>
                {{ csrf_field() }}
            <textarea name="mensaje" placeholder="Write your message" required></textarea>
            <br><br>
            <center>
                <button class="btn blue darken-4" type="submit" name="action">Send Message
                <i class="material-icons right">send</i>
                </button>
            </center>
            
            </div>
        </form>
    <br><br><br>
    </div>    
    <br><br><br>
</div>
</div>