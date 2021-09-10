@extends('layouts.principal_users')
@section('navigation')
    <div class="row header">
        @include('partials.seller.navigation_buyer')
    </div>
@endsection
@section('content')
    <div class="container">
        <p>{!! __('<strong>Nombre: </strong>') . $user->name !!}</p>
        <p>{!! __('<strong>Correo: </strong>') . $user->email !!}</p>
        <p>{!! __('<strong>Rol: </strong>') . $user->role !!}</p>
    </div>

@endsection
