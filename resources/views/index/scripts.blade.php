<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

<!--<script src="js/jquery2min.js"></script>-->
<script src="{{asset('sweet/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/principal/materialize.js')}}"></script>
<script src="{{ asset('js/principal/init.js')}}"></script>
<script src="{{ asset('js/principal/index.js')}}"></script>
<script src="{{ asset('js/principal/scroll.js')}}"></script>
<script src="{{ asset('js/principal/scrollFire.js')}}"></script>
<script src="{{ asset('js/principal/message.js')}}"></script>
<script src="{{ asset('js/principal/productos.js')}}"></script>
<script src="{{ asset('loader/loader.js')}}"></script>


@if(isset($mov))
<script>
    $(document).ready(function(){
       $('.collapsible').collapsible();
     });
</script>
@endif
