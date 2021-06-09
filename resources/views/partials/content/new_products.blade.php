<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="pt-4 pb-2">{{ __('Todas las novedades') }}</h2> 
                <p class="pb-4">Encuentra las últimas novedades en videojuegos y merchandising</p>
            </div>
                      
        </div>
        <div class="row justify-content-center">       
                @foreach ($products as $product)
                <div class="card col-md-3">
                    <div class="card-image pt-4">
                        <img src="images/{{ $product->image }}" width="240px" height="240px" alt="" />                        
                    </div>
                    <div class="card-body">
                        <p class="card-title">
                            {{ $product->name_product }} 
                        </p>
                        <p class="card-text">{{ $product->price }} €</p>
                        <a href="#" class="btn btn-primary">{{ __('Comprar') }}</a>                                               
                    </div>
                </div>
                   
                @endforeach
         
        </div>
    </div>    
</section>