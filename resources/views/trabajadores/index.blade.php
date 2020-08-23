@extends('layouts.main')

@section('title','Trabajadores')

@section('styles')
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="background-color: white !important">
  <li><a href="#">Trabajadores</a></li>
  <li><a href="#">Gestion</a></li>
</ol>
@endsection

@section('content')
<section class="content-header">
  <button class="btn bg-olive pull-left" data-toggle="modal" data-target="#modal_create_user">
  <span class="fa fa-plus"></span> &nbsp; Nuevo usuario
  </button>
<p><br></p>
</section>
<section class="content">
  @include('trabajadores.table')
  <!--modales-->
  @include('trabajadores.create')
  @include('trabajadores.show')
  @include('trabajadores.edit')
  @include('user.create')
  <!--/.end-modales-->
</section>
@endsection

@section('scripts')
<script src="{{ asset('js/usuarios/user.js') }}"></script>    
@endsection