@extends('layouts.main')
@section('title','Dashboard')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
          @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
          <div class="row">
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>{{$array['npedido']}}</h3>

                  <p>Número de Pedidos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>{{$array['ncategoria']}}<sup style="font-size: 20px"></sup></h3>

                  <p>Número de Categorias</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
            <!-- ./col -->
          <div class="row">
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$array['nusuario']}}</h3>

                  <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3>{{$array['nproductos']}}</h3>

                  <p>Número de productos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-pink">
                <div class="inner">
                  <h3>{{$array['ninsumo']}}</h3>

                  <p>Número de insumos</p>
                </div>
                <div class="icon">
                  <i class="ion ion-tshirt"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
             <!-- ./col -->
            <div class="col-lg-6">
              <!-- small box -->
              <div class="small-box bg-blue">
                <div class="inner">
                  <h3>{{$array['nproveedor']}}</h3>

                  <p>Número de proveedores</p>
                </div>
                <div class="icon">
                  <i class="ion ion-steam"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
                      

          </div> <!-- end.row-->
        </div> <!-- end.card-body-->
      </div>
    </div>
  </div>
</div>
@endsection
