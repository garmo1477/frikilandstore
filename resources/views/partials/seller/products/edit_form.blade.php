<div class="container mt-5 mb-5">
    <div class="col-md-12 form-card">
        
        @if (!session('error-login'))
            @include('partials.errorsForm')
        @endif
        <h2 class="pb-2">{{ $title }}</h2>
        
        <form action="{{ route('seller.update', $product) }}" files="true" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                
                <input type="file" class="form-control" autocomplete="off" name="image" placeholder="{{ __('Portada') }}" />
            </div>
            <div class="form-group">
                {!! Form::label('in_offer', __('¿Quieres ponerle de oferta?')) !!}
                @if ($product->in_offer == 1)
                    {{ Form::checkbox('in_offer', 1, true) }}
                @else
                    {{ Form::checkbox('in_offer', 1, false) }}
                @endif
            </div>
            <div class="form-group">
                <input class="form-control" autocomplete="off" value="{{ $product->name_product }}" name="name_product" type="text"
                    placeholder="{{ __('Nombre producto') }}" />
            </div>
            <div class="form-group">
                <input class="form-control" autocomplete="off" value="{{ $product->description }}" name="description" type="text"
                    placeholder="{{ __('Descripción') }}" />
            </div>
            <div class="form-group">
                <input class="form-control" autocomplete="off" value="{{ $product->category }}" name="category" type="text"
                    placeholder="{{ __('Añade una categoría') }}" />
            </div>
            <div class="form-group">
                <input class="form-control" autocomplete="off" value="{{ $product->price }}" name="price" type="number"
                    placeholder="{{ __('Añade un precio') }}" />
            </div>
            <a href="{{ route('seller.index') }}" class="btn btn-danger">{{ __('Volver al listado') }}</a>
            <button type="submit" class="btn btn-success float-right">
                {{ __('Actualizar producto') }}
            </button>
        </form>
    </div>
</div>
