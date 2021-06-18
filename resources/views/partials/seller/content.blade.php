<section>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <h2 class="pt-4 pb-2 text-center">{{ __('Bienvenido/a a tu perfil') }}</h2>
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
                                <td>
                                    <img src="images/{{ $product->image }}" class="img-fluid" width="340px"
                                        height="200px" alt="{{ $product->name_product }}" />
                                </td>
                                <td>{{ $product->name_product }}</td>
                                <td>{{ $product->price }} €</td>
                                <td>
                                    <a class="btn btn-outline-success float-left"
                                        href="{{ route('seller.edit', ['product' => $product]) }}">
                                        {{ __('Editar') }}
                                    </a>
                                    <form action="{{ route('seller.destroy', $product) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-outline-danger float-right">{{ __('Eliminar') }}</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success float-right mb-5"
                    href="{{ route('seller.create') }}">{{ __('Crear nuevo producto') }}</a>
            </div>
        </div>
    </div>
</section>
