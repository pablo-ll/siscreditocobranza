@extends('adminlte::page')

@section('content_header')
    <h1><b> Roles/Datos registrados</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">

        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>


                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nombre del rol</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" value="{{$role->name}}" disabled name="name" >

                                            </div>
                                            @error('name')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/roles')}}" class="btn btn-secondary">Volver</a>
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
