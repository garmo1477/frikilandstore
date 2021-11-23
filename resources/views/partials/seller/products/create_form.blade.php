<?php
@include('vendor.autoload')
// this will simply read AWS_ACCESS_KEY_ID and AWS_SECRET_ACCESS_KEY from env vars
$s3 = new Aws\S3\S3Client([
    'version'  => '2006-03-01',
    'region'   => 'us-east-1',
]);
$bucket = getenv('AWS_BUCKET')?: die('No "AWS_BUCKET" config var in found in env!');

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['image']['tmp_name'])) {
    // FIXME: you should add more of your own validation here, e.g. using ext/fileinfo

        // FIXME: you should not use 'name' for the upload, since that's the original filename from the user's computer - generate a random filename that you then store in your database, or similar
        $upload = $s3->upload($bucket, $_FILES['image']['name_file'], fopen($_FILES['image']['tmp_name'], 'rb'), 'public-read');
}
?>

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
            {!! Form::label('in_offer', __('¿Quieres ponerle de oferta?')) !!}
            @if ($product->in_offer == 1)
                {{ Form::checkbox('in_offer', 1, true) }}
            @else
                {{ Form::checkbox('in_offer', 1, false) }}
            @endif
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
            {!! Form::select('category', ['Videojuegos' => 'Videojuegos', 'Merchan' => 'Merchan', 'Peliculas' => 'Peliculas'], 'Seleccionar categoria', ['class' => 'form-control', 'placeholder' => 'Seleccionar categoría']) !!}

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