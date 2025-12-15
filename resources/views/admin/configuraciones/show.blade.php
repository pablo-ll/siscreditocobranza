@extends('adminlte::page')

@section('content_header')
    <h1><b> Configuracion/Datos registrados</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>


                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre empresa</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$configuracion->nombre}}" disabled name="nombre" >

                                            </div>
                                            @error('nombre')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Descripcion</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="descripcion" value="{{$configuracion->descripcion}}" disabled>

                                            </div>
                                            @error('descripcion')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Direccion</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                                </div>
                                                <input type="text" class="form-control"  name="direccion" value="{{$configuracion->direccion}}" disabled>
                                            </div>
                                            @error('direccion')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Telefono</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="telefono" value="{{$configuracion->telefono}}" disabled>

                                            </div>
                                            @error('telefono')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" name="email" value="{{$configuracion->email}}" disabled>

                                            </div>
                                            @error('email')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Pagina web</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-pager"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="web" value="{{$configuracion->web}}" disabled>

                                            </div>
                                        </div>

                                    </div>
                                     <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Moneda</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-coins"></i></span>
                                                </div>
                                                <select name="moneda" id="" class="form-control" disabled>
                                                    <option value="{{$configuracion->moneda}}">{{$configuracion->moneda}}</option>
                                                 

                                                </select>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="logo">Logo</label><br><br>
                                   <img src="{{asset('storage/'.$configuracion->logo)}}" width="100px" alt="imagen">

                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/configuraciones')}}" class="btn btn-secondary">Volver</a>
                                </div>
                            </div>
                        </div>

                    

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>


    </div>

@stop

@section('css')

@stop

@section('js')

@stop
