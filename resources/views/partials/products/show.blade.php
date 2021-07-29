@extends('layouts.principal')

@section('hero')
    @include('partials.perfils.hero')
@endsection

@section('content')
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-6 mb-4 d-none d-sm-block">
                <div class="pt-4 text-right">
                    <img src="../../images/{{ $product->image }}" class="" width="80%" height="auto"
                        alt="{{ $product->name_product }}" />
                </div>
            </div>
            <div class="col-md-6 mb-4 d-block d-sm-none">
                <div class="pt-4">
                    <img src="../../images/{{ $product->image }}" class="" width="80%" height="auto"
                        alt="{{ $product->name_product }}" />

                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3> {{ $product->name_product }}
                        @if ($product->in_offer === 1)
                            <span style="font-size: 14px;"
                                class="bg-success text-white p-1 ml-2">{{ __('En Oferta') }}</span>
                        @endif
                    </h3>

                    <p>{{ $product->description }}</p>
                    <p class="card-text">{{ $product->price }} €</p>
                    <a href="" class="btn btn-primary">{{ __('Comprar') }}</a>
                </div>
            </div>
            
           {{-- <div class="float-right">
                <a href="{{ URL::previous() }}" class="btn btn-primary">{{ __('Volver') }}</a>
            </div> --}} 
        </div>

    </div>
@endsection
