{{--

  ____          _____               _ _           _
 |  _ \        |  __ \             (_) |         | |
 | |_) |_   _  | |__) |_ _ _ __ _____| |__  _   _| |_ ___
 |  _ <| | | | |  ___/ _` | '__|_  / | '_ \| | | | __/ _ \
 | |_) | |_| | | |  | (_| | |   / /| | |_) | |_| | ||  __/
 |____/ \__, | |_|   \__,_|_|  /___|_|_.__/ \__, |\__\___|
         __/ |                               __/ |
        |___/                               |___/

    Blog:       https://parzibyte.me/blog
    Ayuda:      https://parzibyte.me/blog/contrataciones-ayuda/
    Contacto:   https://parzibyte.me/blog/contacto/

    Copyright (c) 2020 Luis Cabrera Benito
    Licenciado bajo la licencia MIT

    El texto de arriba debe ser incluido en cualquier redistribucion
--}}
@if(session("mensaje"))
    <script>
      $(function() {
            Swal.fire({
                position: 'top-end',
                title: 'Alerta!',
                text: '{{session('mensaje')}}',
                icon: '{{session('tipo') ? session("tipo") : "info"}}',
                showConfirmButton: false,
                timer: 1500
            })
        });
    </script>

    {{--
    <div class="alert alert-{{session('tipo') ? session("tipo") : "warning"}} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-info"></i> Alerta!</h5>
        {{session('mensaje')}}
    </div>
    --}}
@endif
