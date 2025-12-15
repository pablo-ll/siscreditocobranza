@extends('adminlte::page')

@section('content_header')
    <h1><b> Configuracion/Modificacion</b></h1>
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
                    <form action="{{url('admin/configuraciones', $configuracion->id)}}" method="post" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombre empresa</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-home"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="nombre" placeholder="Escriba aqui..." value="{{$configuracion->nombre}}">

                                            </div>
                                            @error('nombre')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Descripcion</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="descripcion" placeholder="Escriba aqui..." value="{{$configuracion->descripcion}}">

                                            </div>
                                            @error('descripcion')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Direccion</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                                                </div>
                                                <input type="text" class="form-control"  name="direccion" placeholder="Escriba aqui..." value="{{$configuracion->direccion}}">
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
                                            <label for="">Telefono</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="telefono" placeholder="Escriba aqui..." value="{{$configuracion->telefono}}">

                                            </div>
                                            @error('telefono')
                                            <small style="color: red">{{$message}}</small>
                                                
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Email</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                </div>
                                                <input type="email" class="form-control" name="email" placeholder="Escriba aqui..." value="{{$configuracion->email}}">

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
                                                <input type="text" class="form-control" name="web" placeholder="Escriba aqui..." value="{{$configuracion->web}}">

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
                                                <select name="moneda" id="" class="form-control">
                                                    <option value="usd" {{$configuracion->moneda=='usd' ? 'selected' : ''}}>Dolar (USD)</option>
                                                    <option value="Bs." {{$configuracion->moneda=='Bs.' ? 'selected' : ''}}>Bolivianos (BOB)</option>

                                                </select>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="logo">Logo</label><b>(*)</b>
                                    <input type="file" id="file" name="logo" accept=".jpg, .jpeg, .png"
                                        class="form-control" >
                                    @error('logo')
                                        <small style="color: red; font-size: 11px;">{{ $message }}</small>
                                    @enderror
                                    <br>
                                    <center><output id="list">
                                        <img src="{{asset('storage/'.$configuracion->logo)}}" width="100px" alt="imagen">
                                    </output></center>
                                    <script>
                                        function archivo(evt) {
                                            var files = evt.target.files; // FileList object
                                            // obtenemos la imagen del campo "file"
                                            for (var i = 0, f; f = files[i]; i++) {
                                                if (!f.type.match('image.*')) {
                                                    continue;
                                                }
                                                var reader = new FileReader();
                                                reader.onload = (function(theFile) {
                                                    return function(e) {
                                                        document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e
                                                            .target.result, '" width="70%" title="', escape(theFile.name), '"/>'
                                                        ].join('');
                                                    };
                                                })(f);
                                                reader.readAsDataURL(f);


                                            }
                                        }
                                        document.getElementById('file').addEventListener('change', archivo, false);
                                    </script>

                                </div>

                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{url('/admin/configuraciones')}}" class="btn btn-secondary">Cancelar</a>
                                    <button type="submit" class="btn btn-warning">Modificar</button>
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
