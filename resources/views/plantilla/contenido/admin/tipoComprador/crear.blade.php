@extends('layouts.appAdmin')
@section('contenido')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
 
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
       <h1>Tipo de Comprador</h1>
        </div>

        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('Comprador.index')}}">Consultar</a></li>
            <li class="breadcrumb-item active">Agregar</li>
          </ol>

      </div>
    </div><!-- /.container-fluid -->
  </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Agregar un tipo de comprador</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form"  method="post" action="{{route('tipoComprador.store')}}" id="quickForm">
                @csrf
                <div class="card-body">

                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Premium">
                        {!!$errors->first('nombre','<small>:message</small><br>')!!}
                    </div>

                    <div class="form-group">
                        <label for="">Descuento</label>
                        <input type="text" value="0" required="true" name="descuento"  class="form-control" placeholder="10">
                        {!!$errors->first('descuento','<small>:message</small><br>')!!}
                    </div>


                    <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox"  class="custom-control-input" id="envio" name="envio">
                          <label class="custom-control-label" for="envio">Envio gratis</label>
                          
                        </div>
                      </div>
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                          <input type="checkbox"  class="custom-control-input" id="precio" name="precio">
                          <label class="custom-control-label" for="precio">Mostrar precio de los productos</label>
                        </div>
                      </div>
                  
                 
                  <div class="form-group">
                      
                      <div class="custom-control custom-switch">
                        <input type="checkbox"  class="custom-control-input" id ="activo" name="activo">
                        <label class="custom-control-label" for="activo">Activo</label>
                      </div>
                    </div>
                    
             
                  
                      

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button class="btn btn-secondary float-left"href="{{route('tipoComprador.index')}}">Volver</button>
                  <button type="submit" class="btn btn-primary float-right">Agregar tipo de comprador</button>
                </div>

              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
