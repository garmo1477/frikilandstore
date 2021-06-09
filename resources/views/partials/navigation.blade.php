<div class="col-md-4">
    <img src="../images/logo.png" alt="">
</div>
<div class="col-md-5">
    <div class="links">
        <a class="pl-3" href="{{ route('welcome') }}">Inicio</a>
        <a class="pl-3" href="#">Juegos</a>
        <a class="pl-3" href="#">Merchan</a>
        <a class="pl-3" href="#">Blog</a>
        <a class="pl-3" href="#">Contacto</a>
    </div>
</div>
<div class="col-md-3">
    <div class="links">
       @include('partials.login.navigation_login')
    </div>
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
