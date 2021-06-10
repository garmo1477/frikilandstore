@guest
            <button type="button" id="button_login" class="btn btn-primary" data-toggle="modal"
                data-target="#login-modal">{{ __('Acceder') }}
            </button>
            @include('partials.modals.login')
            <a class="pl-3 btn" href="{{ route('registro') }}">Registrarse</a>
        @else
            <div class="dropdown">
                <a class="btn btn-danger dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    {{ __(':user', ['user' => auth()->user()->name]) }}
                </a>
                {{-- PARA ROL DE USUARIO VENDEDOR --}}
                @if (auth()->user()->role === 'SELLER')
                    <div class="dropdown-menu bg-danger" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('seller.index') }}" class="dropdown-item">
                            {{ __('Perfil Vendedor') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                        </a>
                    </div>
                @endif
                {{-- PARA ROL DE USUARIO COMPRADOR --}}
                @if (auth()->user()->role === 'BUYER')
                    <div class="dropdown-menu bg-danger" aria-labelledby="dropdownMenuButton">
                        <a href="{{ route('buyer.index') }}" class="dropdown-item">
                            {{ __('Perfil Comprador') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                        </a>
                    </div>
                @endif
            </div>
            <form action="{{ route('logout') }}" method="GET" id="logout-form" style="display:none;">
                @csrf
            </form>
        @endguest