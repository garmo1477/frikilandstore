<section>
    <div class="row">
        <div class="col-md-12 banner">
            <div class="row">
                <div class="d-none d-md-block col-md-4 centered">
                    @guest
                        <h1 class="text-center">{{ __('¡Crea ya tu cuenta y empieza a comprar!') }}</h1></br>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('registro') }}" class="btn btn-primary">{{ __('Registrarse') }}</a>
                        </div>
                    @endguest
                    @auth
                        <div class="text-center centered mt-5">
                            <h2 class="">
                                {{ __('¡Bienvenido/a :user a Frikiland Store!', ['user' => auth()->user()->name]) }}
                            </h2>
                            <p class="">{{ __('Accede a tu perfil para realizar cualquier gestión') }}</p>
                        </div>

                    @endauth

                </div>
            </div>

        </div>
    </div>
</section>
