@extends('adminlte::page')

@section('content_header')
<h1><b> Pagos/Datos pago</b></h1>
<hr>
@stop

@section('content')

<div class="row">

    <div class="col-md-12">
        <div class="card  card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos del cliente</h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">

                <div class="row">
                    <div class="col-md-6">
                        <label for="">Búsqueda del cliente</label><b> (!)</b>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            </div>
                            <select name="cliente_id" id="" class="form-control select2">
                                <option value="">Buscar cliente...</option>
                                @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}"  {{$datoscliente->id == $cliente->id ? 'selected': '' }}>
                                    {{ $cliente->nro_documento . ' - ' . $cliente->apellidos . ' ' . $cliente->nombres }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                @error('cliente_id')
                <small style="color: red">{{ $message }}</small>
                @enderror


             <div class="row">
                <div class="col-md-4">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Datos del cliente</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <p>
                                        <i class="fas fa-id-card"></i> {{ $datoscliente->nro_documento }} <br><br>
                                        <i class="fas fa-user"></i> {{ $datoscliente->apellidos }},
                                        {{ $datoscliente->nombres }} <br><br>
                                        <i class="fas fa-calendar"></i> {{ $datoscliente->fecha_nacimiento }} <br><br>
                                        <i class="fas fa-user-check"></i> {{ $datoscliente->genero }} <br><br>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p>
                                        <i class="fas fa-envelope"></i> {{ $datoscliente->email }} <br><br>
                                        <i class="fas fa-phone"></i> {{ $datoscliente->celular }} <br><br>
                                        <i class="fas fa-phone"></i> {{ $datoscliente->ref_celular }} <br><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <!-- /.card-body -->
            </div>
           
            <!-- /.card -->
        </div>


    </div>
</div>


@stop

@section('css')
<style>
    .select2-container .select2-selection--single {
        height: 40px !important;
        /* Ajusta la altura total del select */
    }
</style>
@stop

@section('js')

<script>
    $('.select2').select2();

    $('.select2').on('change', function() {
        var id = $(this).val();
        //alert(cliente_id);
        if (id) {
            window.location.href = "{{url('/admin/pagos/create')}}" + "/" + id;

        }
    });
</script>


@stop