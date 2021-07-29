<style>
    .register-form div.spacing {
        padding: 6%;
    }

</style>
<div class="row register-form mt-4">
    <div class="col-lg-6 spacing">
        <div>
            @if (!session('error-login'))
                @include('partials.errorsForm')
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (!session('error-login'))
                @include('partials.errorsForm')
            @endif
            @guest
                <div class="section-title text-center pt-4 pb-4">
                    <h2 class="text-white">{{ __('¿Quieres vender todos tus productos en Frikiland Store') }}</h2>
                    <p class="text-white">{{ __('Regístrate como vendedor y podrás publicarlos') }}</p>
                </div>
                <!-- signup form -->
                <form id="seller-form" class="signup-form" action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="role" value="{{ \App\User::SELLER }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" autocomplete="off" name="name" value="{{ old('name') }}"
                                type="text" placeholder="{{ __('Nombre') }}" />
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" autocomplete="off" name="email" value="{{ old('email') }}"
                                type="text" placeholder="{{ __('Correo Electrónico') }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <input class="form-control" name="password" type="password" />
                        </div>
                        <div class="form-group col-md-6">
                            <input class="form-control" name="password_confirmation" type="password" />
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <button class="btn btn-primary mr-3">{{ __('Crear cuenta de vendedor') }}</button>
                    </div>
                </form>
            @endguest
            @auth
                <h2 class="text-white">
                    {{ __('Todos los productos de Frikiland Store', ['user' => auth()->user()->name]) }}</h2>
                <p class="text-white">{{ __('Visita nuestros apartados de productos y encuentra lo que buscas') }}</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('videogames.index') }}" class="btn btn-primary">{{ __('Ver Juegos') }}</a>
                    <a href="" class="btn btn-primary ml-4">{{ __('Ver Merchan') }}</a>
                </div>
            @endauth

            <div id="success-seller-signup" class="section-title text-white text-left">

            </div>

        </div>
    </div>
    <div class="col-md-6 set-bg"></div>
</div>
