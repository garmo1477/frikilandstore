<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="loginModal">{{ __('Accede a tu cuenta') }}</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if (session('error-login'))
            <div class="form-errors">
                <p class="bg-danger text-white p-2">{{ session('error-login') }}</p>
            </div>
          @endif
          {{-- login form --}}

          <form action="{{ route('login') }}" method="POST">
              @csrf
              <div class="form-group">
                  <input class="form-control" autocomplete="off" name="email" value="{{ old('email') }}"
                      type="text" placeholder="{{ __('Correo Electrónico') }}" />
              </div>    
        
              <div class="form-group">
                  <input class="form-control" autocomplete="off" name="password" type="password"
                      placeholder="{{ __('Contraseña') }}" />
              </div>
              <button
                  type="submit"
                  class="btn btn-success"
              >
                  {{ __('Iniciar sesión') }}
              </button>
          </form>
        </div>
        
      </div>
    </div>
  </div>