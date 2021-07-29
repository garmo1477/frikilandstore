<div class="col-xs-6 col-md-4">
    <img src="../images/logo.png" class="" alt="">
</div>
<div class="col-md-5 d-none d-sm-block">
    <div class="links ">
        <a class="pl-3" href="{{ route('welcome') }}">{{ __('Inicio') }}</a>
        <a class="pl-3" href="{{ route('videogames.index') }}">{{ __('Videojuegos') }}</a>
        <a class="pl-3" href="{{ route('merchan.index') }}">{{ __('Merchan') }}</a>
        <a class="pl-3" href="{{ route('movies.index') }}">{{ __('Películas') }}</a>
        <a class="pl-3" href="#">Contacto</a>
    </div>    
</div>
<div style="padding-top: 1.7em;" class="col-md-3 d-none d-sm-block ">
    @include('partials.login.navigation_login')
</div>
<div class="col-xs-6 d-block d-sm-none">
    <nav class="navbar navbar-expand-md navbar-dark">
        <!-- Brand -->

        <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav links">
                <li><a class="pl-3" href="{{ route('welcome') }}">{{ __('Inicio') }}</a></li>
                <li><a class="pl-3" href="{{ route('videogames.index') }}">{{ __('Videojuegos') }}</a></li>
                <li><a class="pl-3" href="{{ route('merchan.index') }}">{{ __('Merchan') }}</a></li>
                <li><a class="pl-3" href="">{{ __('Peliculas') }}</a></li>
                <li><a class="pl-3" href="#">Contacto</a></li>
                <div class="links">
                    @include('partials.login.navigation_login')
                </div>
            </ul>
        </div>
    </nav>
</div>


@push('js')
    <script>
        {{-- para usar el @push(js) hay que poner @stack(js) en la plantilla principal.blade --}}

        {{-- Hacemos que si hay un error con las credenciales, se quede en el propio modal y salga el error --}}

        @if (session('error-login'))
            $('#login-modal').modal();
        @endif
        $('#button_login').on('click', function(e) {
            e.preventDefault();
            $('#login-modal').modal();
        })
    </script>
@endpush
