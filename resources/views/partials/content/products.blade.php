<div class="row d-flex">       
    @foreach ($products as $product)
    <div class="card col-md-3 mb-4">
        <div class="card-image pt-4">
            <img src="images/{{ $product->image }}" class="img-fluid" width="300px" height="190px" alt="" />                        
        </div>
        <div class="card-body">
            <h5 class="card-title">
                {{ $product->name_product }} 
            </h5>
            <p class="card-title">
                {{ $product->description }} 
            </p>
            <p class="card-text">{{ $product->price }} €</p>
            <a href="#" class="btn btn-primary">{{ __('Comprar') }}</a>                                               
        </div>
    </div>                   
    @endforeach                
</div>
<div class="row">
<div class="col-md-12">
    {{ $products->links() }}
</div>

</div>