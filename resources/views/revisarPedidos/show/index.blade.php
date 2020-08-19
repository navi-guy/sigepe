@extends('layouts.main')

@section('title','Visualizar Pedido')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="{{ route('revisarPedidos.index') }}">Evaluar Pedidos</a></li>
  <li><a href="#" class="text-muted">Visualizar</a></li>
</ol>
@endsection

@section('content')
<section class="content">
  @include('revisarPedidos.show.form')
</section>
@endsection

@section('scripts')

@endsection