@extends('adminlte::page')

@section('content_header')
    <h1><b> Usuarios/ Datos del usuario</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del usuario</h3>


                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                   
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Rol</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                                </div>
                                                
                                                <input type="text" class="form-control" name="name" value="{{$usuario->roles->pluck('name')->implode(', ')}}"  disabled>
                                                
                                            </div>
                                            @error('rol')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nombre del usuario</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="name"  value="{{$usuario->name}}" disabled>
                                                

                                            </div>
                                            @error('name')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                            </div>
                             <div class="col-md-12">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" name="email" value="{{$usuario->email}}" disabled>
                                                

                                            </div>
                                            @error('email')
                                                <small style="color: red">{{ $message }}</small>
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
                                    <a href="{{ url('/admin/usuarios') }}" class="btn btn-secondary">Volver</a>
                                
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
