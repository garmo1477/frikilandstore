@extends('layouts.principal')

@section('hero')
    @include('partials.simple_banner')
@endsection
@section('content')
    <div class="container">
        <div class="row mt-4 mb-4">
            <div class="col-lg-12 pt-5 pb-5 pl-5 pr-5">
                <div class="">
                    <div class="section-title text-center pt-4 pb-4">
                        <h2 class="">{{ __('Crea tu cuenta para realizar compras') }}</h2>
                        <p class="">{{ __('Regístrate para poder comprar los productos que más te interesan') }}</p>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (!session('error-login'))
                        @include('partials.errorsForm')
                    @endif

                    <!-- signup form -->
                    <form id="buyer-form" class="signup-form" action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group">
                                <input class="form-control" type="hidden" name="role" value="{{ \App\User::BUYER }}" />
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
                                <input class="form-control" autocomplete="off" name="password" type="password"
                                    placeholder="{{ __('Contraseña') }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <input class="form-control" autocomplete="off" name="password_confirmation" type="password"
                                    placeholder="{{ __('Confirma la contraseña') }}" />
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <button class="btn btn-success mr-3">{{ __('Crear cuenta') }}</button>
                        </div>

                    </form>

                    <div id="success-buyer-signup" class="section-title text-white text-left">

                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
