<div class="container mt-5 mb-5">
    <div class="col-md-12 form-card">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (!session('error-login'))
            @include('partials.errorsForm')
        @endif
        <h2 class="pb-2">{{ $title }}</h2>
        
        {!! Form::model($product, $options) !!}  

        <div class="custom-file pb-5">
            {!! Form::file('image', ['class' => 'custom-file-input', 'id' => 'image']) !!}
            {!! Form::label('image', __('Selecciona una imagen para tu producto'), ['class' => 'custom-file-label']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name_product', __('Nombre Producto')) !!}
            {!! Form::text('name_product', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', __('Añade una descripción al producto')) !!}
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category', __('Dale una categoría')) !!}
            {!! Form::text('category', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price', __('Añade un precio')) !!}
            {!! Form::number('price', null, ['class' => 'form-control']) !!}
        </div>

        {!! Form::submit($textButton, ['class' => 'btn btn-success mb-4 float-right']) !!}
        <a href="{{ route('seller.index') }}" class="btn btn-primary mb-4">{{ __('Volver al Perfil') }}</a>


        {!! Form::close() !!}
    </div>
</div>
