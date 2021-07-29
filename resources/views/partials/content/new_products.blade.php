<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="pt-4 pb-2">{{ __('Todas las novedades') }}</h2>
                <p class="pb-4">{{ __('Encuentra las últimas novedades en videojuegos, merchandising y películas') }}</p>
            </div>
        </div>
        <div class="row d-flex">
            @foreach ($products as $product)
                <div class="card col-md-3 mb-4">
                    <div class="card-image pt-4">
                        <a href="{{ route('product.show', $product) }}">
                            <img src="images/{{ $product->image }}" class="img-fluid" width="300px" height="190px"
                                alt="" />
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="{{ route('product.show', $product) }}">{{ $product->name_product }}
                                @if ($product->in_offer === 1)
                                    <span style="font-size: 14px;"
                                        class="bg-success text-white p-1 ml-2">{{ __('En Oferta') }}</span>
                                @endif
                            </a>
                        </h5>
                        <p class="card-text">{{ $product->price }} €</p>
                        <a href="{{ route('product.show', $product) }}"
                            class="btn btn-primary">{{ __('Comprar') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
