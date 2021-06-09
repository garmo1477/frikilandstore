@extends('layouts.principal')

@section('hero')
    @include('partials.banner')
@endsection

@section('content')
    @include('partials.content.new_products')
    @include('partials.content.seller_form')
    @include('partials.content.featured')
@endsection
