<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="pt-4 pb-2">{{ __('Nuestras Promociones') }}</h2> 
                <p class="pb-4">{{ __('Encuentra ofertas especiales en tus productos favoritos') }}</p>
            </div>                      
        </div>
        <div class="row justify-content-center">       
            @foreach ($inoffer as $product)
                <div class="card col-md-4 mb-5">
                    <div class="card-image pt-4">
                       <img class="img-fluid" src="images/{{ $product->image }}" width="340px" height="200px" alt="{{ $product->name_product }}"/>                         
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            {{ $product->name_product }} <span class="bg-success text-white p-1 ml-2">{{ __('En Oferta') }}</span>
                        </p>                        
                        <p class="card-text mt-1 p-1">{{ $product->price }} €</p>
                        <a href="#" class="btn btn-primary">{{ __('Comprar') }}</a>                                               
                    </div>
                </div>                   
            @endforeach         
        </div>
    </div>    
</section>