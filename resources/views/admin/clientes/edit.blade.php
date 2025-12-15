@extends('adminlte::page')

@section('content_header')
    <h1><b> Clientes/Modificar</b></h1>
    <hr>
@stop

@section('content')
    <div class="row">

        <div class="col-md-12">
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title">Llenar los datos del formulario</h3>


                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body" style="display: block;">
                    <form action="{{ url('admin/clientes', $cliente->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cedula de identidad</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="nro_documento"
                                                    value="{{ $cliente->nro_documento }}" placeholder="Escriba aqui..."
                                                    required>


                                            </div>
                                            @error('nro_documento')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres del cliente</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="nombres"
                                                    placeholder="Escriba aqui..." required value="{{ $cliente->nombres }}">


                                            </div>
                                            @error('nombres')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos del cliente</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="apellidos"
                                                    placeholder="Escriba aqui..." required
                                                    value="{{ $cliente->apellidos }}">


                                            </div>
                                            @error('apellidos')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control" name="fecha_nacimiento"
                                                    placeholder="Escriba aqui..." required
                                                    value="{{ $cliente->fecha_nacimiento }}">


                                            </div>
                                            @error('fecha_nacimiento')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Genero</label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                                    </div>
                                                    <select class="form-control" name="genero" id="" required>
                                                        @if ($cliente->genero == 'MASCULINO')
                                                            <option value="MASCULINO">MASCULINO</option>
                                                            <option value="FEMENINO">FEMENINO</option>
                                                        @else
                                                            <option value="FEMENINO">FEMENINO</option>
                                                            <option value="MASCULINO">MASCULINO</option>
                                                        @endif

                                                    </select>


                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Email</label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email"
                                                        placeholder="Escriba aqui..." required
                                                        value="{{ $cliente->email }}">


                                                </div>
                                                @error('email')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">celular</label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="celular"
                                                        placeholder="Escriba aqui..." required
                                                        value="{{ $cliente->celular }}">


                                                </div>
                                                @error('celular')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Referencia celular</label><b>(*)</b>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="ref_celular"
                                                        placeholder="Escriba aqui..." required
                                                        value="{{ $cliente->ref_celular }}">


                                                </div>
                                                @error('ref_celular')
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
                                        <a href="{{ url('/admin/clientes') }}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-warning">Actualizar</button>
                                    </div>
                                </div>
                            </div>

                    </form>

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
