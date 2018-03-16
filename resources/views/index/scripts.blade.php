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
<script src="{{ asset('js/principal/curriculum.js')}}"></script>
<script src="{{ asset('loader/loader.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-115931172-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-115931172-1');
</script>



@if(isset($mov))
<script>
    $(document).ready(function(){
       $('.collapsible').collapsible();
     });
</script>
@endif
