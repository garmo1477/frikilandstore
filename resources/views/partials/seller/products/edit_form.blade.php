<div class="container mt-5 mb-5">
    <div class="col-md-12 form-card">
        
        @if (!session('error-login'))
            @include('partials.errorsForm')
        @endif
        <h2 class="pb-2">{{ $title }}</h2>
        <form action="{{ route('seller.update') }}" file="true" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <input class="form-control" autocomplete="off" name="image" value="{{ old('image') }}" type="file"
                    placeholder="{{ __('Portada') }}" />
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
            <button type="submit" class="btn btn-success">
                {{ __('Actualizar producto') }}
            </button>
        </form>
    </div>
</div>
