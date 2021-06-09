<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="pt-4 pb-2">{{ __('Bienvenido/a a tu perfil') }}</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="container">
                <h4>{{ __('Tus productos publicados') }}</h4>
             
                <table class="table table-dark text-center table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Imagen') }} </th>
                            <th>{{ __('Nombre Producto') }}</th>
                            <th>{{ __('Precio') }}</th>
                            <th>{{ __('Acciones') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><img src="images/{{ $product->image }}" width="240px" height="240px" alt="" /></td>
                                <td>{{ $product->name_product }}</td>
                                <td>{{ $product->price }} €</td>
                                <td>
                                   
                                    <a class="btn btn-outline-success" href="{{ route('seller.edit', ['product' => $product]) }}">
                                        {{ __('Editar') }}
                                    </a>
                                    <a class="btn btn-outline-danger" href="">
                                        {{ __('Eliminar') }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success float-right mb-5" href="{{ route('seller.create') }}">{{ __('Crear nuevo producto') }}</a>
            </div>
        </div>
    </div>
</section>

