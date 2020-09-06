@extends('layouts.main')

@section('title','Visualizar Pedido')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  @switch($type)
    @case("pedidos")
      <li><a href="{{ route('pedidos.index') }}">Pedidos</a></li>
      @break
    @case("revisar")
      <li><a href="{{ route('revisarPedidos.index') }}">Revisar Pedidos</a></li>
      @break
    @case("seguir")
      <li><a href="{{ route('seguirPedidos.index') }}">Ejecutar Pedidos</a></li>
      @break
  @endswitch
  <li><a href="#" class="text-muted">Visualizar</a></li>
</ol>
@endsection

@section('content')
<section class="content">
  @include('revisarPedidos.show.form')
</section>
@endsection