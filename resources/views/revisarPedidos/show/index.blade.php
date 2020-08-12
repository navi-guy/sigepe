@extends('layouts.main')

@section('title','Pedidos')

@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('dist/css/alt/AdminLTE-select2.min.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
  <li><a href="{{ route('home.index') }}">Inicio</a></li>
  <li><a href="{{ route('revisarPedidos.index') }}">Revisar Pedidos</a></li>
  <li><a href="#" class="text-muted">Visualizar</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
    <a href="{{ route('revisarPedidos.index') }}">
      <button class="btn btn-default pull-right">
      <span class="fa fa-arrow-left"></span> &nbsp; Atrás
      </button>
    </a> 
    <p><br></p>
</section>
<section class="content">
  @include('revisarPedidos.show.form')
</section>
@endsection

@section('scripts')

@endsection