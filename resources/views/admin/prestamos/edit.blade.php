@extends('adminlte::page')

@section('content_header')
    <h1><b> Prestamos/Modificar</b></h1>
    <hr>
@stop

@section('content')
    <form action="{{ url('admin/prestamos', $prestamo->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-12">
                <div class="card  card-success">
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
                                            <option value="{{ $cliente->id }}" {{$prestamo->cliente_id===$cliente->id ? 'selected':''}}>
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
                        <hr>



                        <div class="row" id="contenido_cliente" style="display: block;">
                            <div class="col-md-12">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Cedula de identidad</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                                </div>
                                                <input type="text" class="form-control"
                                                    id="nro_documento"name="nro_documento" value="{{$prestamo->cliente->nro_documento}}"  placeholder="Escriba aqui..."
                                                    disabled>


                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres del cliente</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="nombres"
                                                value="{{$prestamo->cliente->nombres}}"
                                                    placeholder="Escriba aqui..." id="nombres" disabled>


                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos del cliente</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="apellidos"
                                                value="{{$prestamo->cliente->apellidos}}"
                                                    placeholder="Escriba aqui..." id="apellidos" disabled>


                                            </div>

                                        </div>

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control" name="fecha_nacimiento"
                                                value="{{$prestamo->cliente->fecha_nacimiento}}"
                                                    placeholder="Escriba aqui..." id="fecha_nacimiento" disabled>


                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Genero</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-check"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" name="genero"
                                                    value="{{$prestamo->cliente->genero}}"
                                                        placeholder="Escriba aqui..." id="genero" disabled>


                                                </div>

                                            </div>

                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Email</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email"
                                                    value="{{$prestamo->cliente->email}}"
                                                        placeholder="Escriba aqui..." disabled id="email">


                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">celular</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="celular"
                                                    value="{{$prestamo->cliente->celular}}"
                                                        placeholder="Escriba aqui..." id="celular" disabled>


                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Referencia celular</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fas fa-envelope"></i></span>
                                                    </div>
                                                    <input type="number" class="form-control" name="ref_celular"
                                                    value="{{$prestamo->cliente->ref_celular}}"
                                                        placeholder="Escriba aqui..." id="ref_celular" disabled>


                                                </div>

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
        <div class="row">
            <div class="col-md-12">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Datos del prestamo</h3>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Monto del credito</label>
                                    <input type="text" class="form-control" id="monto_prestado"
                                    value="{{$prestamo->monto_prestado}}"
                                        name="monto_prestado">
                                    @error('monto_prestado')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Tasa de interes</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="tasa_interes" value="10"
                                        value="{{$prestamo->tasa_interes}}"
                                            name="tasa_interes">
                                        <div class="input-group-append">
                                            <span class="input-group-text">%</span>
                                        </div>
                                        @error('tasa_interes')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Modalidad</label>
                                    <select name="modalidad" id="modalidad" class="form-control">
                                        <option value="Diario"  {{$prestamo->modalidad=='Diario'? 'Selected': ''}}>Diario</option>
                                        <option value="Semanal"  {{$prestamo->modalidad=='Semanal'? 'Selected': ''}}>Semanal</option>
                                        <option value="Quincenal"  {{$prestamo->modalidad=='Quincenal'? 'Selected': ''}}>Quincenal</option>
                                        <option value="Mensual"  {{$prestamo->modalidad=='Mensual'? 'Selected': ''}}>Mensual</option>
                                        <option value="Anual"  {{$prestamo->modalidad=='Anual'? 'Selected': ''}}>Anual</option>
                                    </select>
                                    @error('modalidad')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Nro de cuotas</label>
                                    <input type="number" class="form-control" id="nro_cuotas" value="{{$prestamo->nro_cuotas}}"
                                        name="nro_cuotas">
                                    @error('nro_cuotas')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Fecha de prestamo</label>
                                    <input type="date" class="form-control" id="fecha_prestamo"
                                        value="{{$prestamo->fecha_inicio}}"
                                        name="fecha_inicio">
                                    @error('fecha_inicio')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <div style="height: 33px"></div>
                                    <button type="button" class="btn btn-success" onclick="calcularPrestamo();"><i
                                            class="fas fa-calculator"></i>Calcular</button>
                                </div>

                            </div>

                        </div>

                        <hr>
                        <div class="row">

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Monto por cuota</label>
                                    <input type="text" class="form-control" id="monto_cuota" disabled>
                                    <input type="text" class="form-control" id="monto_cuota2" name="monto_cuota"
                                        hidden>
                                    @error('monto_cuota')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Monto Inicial</label>
                                    <input type="text" class="form-control" id="monto_inicial" disabled>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Interes total</label>
                                    <input type="text" class="form-control" id="monto_interes" disabled>
                                </div>

                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Monto final</label>
                                    <input type="text" class="form-control" id="monto_final" name="monto_total"
                                        disabled>
                                    <input type="text" class="form-control" id="monto_total" name="monto_total"
                                        hidden>
                                    @error('monto_total')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>



                        </div>
                        <hr>
                       <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <a href="{{ url('/admin/prestamos') }}" class="btn btn-secondary">Cancelar</a>
                                    <button class="btn btn-success" type="submit">Actualizar prestamo</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </form>
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
                $.ajax({
                    url: "{{ url('/admin/prestamos/cliente') }}" + "/" + id,
                    type: 'GET',
                    success: function(cliente) {
                        $('#contenido_cliente').css('display', 'block');
                        $('#nro_documento').val(cliente.nro_documento);
                        $('#nombres').val(cliente.nombres);
                        $('#apellidos').val(cliente.apellidos);
                        $('#fecha_nacimiento').val(cliente.fecha_nacimiento);
                        $('#genero').val(cliente.genero);
                        $('#email').val(cliente.email);
                        $('#celular').val(cliente.celular);
                        $('#ref_celular').val(cliente.ref_celular);
                    },
                    error: function() {
                        alert('No se pudo obtener la información del cliente');
                    }
                });
            }
        });

        function calcularPrestamo() {
            // 1. Obtener valores del formulario
            const montoPrestado = parseFloat(document.getElementById('monto_prestado').value);
            // Leemos la tasa y la convertimos a decimal. Ahora es el PORCENTAJE FIJO TOTAL del préstamo.
            const tasaFijaTotal = parseFloat(document.getElementById('tasa_interes').value) / 100;
            const modalidad = document.getElementById('modalidad').value;
            const nroCuotas = parseInt(document.getElementById('nro_cuotas').value);

            // 2. Validación
            if (isNaN(montoPrestado) || isNaN(tasaFijaTotal) || isNaN(nroCuotas) || montoPrestado <= 0 || tasaFijaTotal <
                0 || nroCuotas <= 0) {
                alert("Por favor ingrese valores validos.");
                return;
            }

            // El bloque de ajuste de tasas (switch/case) HA SIDO ELIMINADO
            // porque la modalidad y el tiempo no afectan el interés total.

            // // Cálculo del interés total
            // El interés total es un porcentaje fijo del capital, independientemente del número de cuotas.
            const interesTotal = montoPrestado * tasaFijaTotal; // <-- FÓRMULA SIMPLIFICADA

            // Cálculo del total a pagar
            const totalCancelar = montoPrestado + interesTotal;

            // Cálculo de la cuota fija
            const cuota = totalCancelar / nroCuotas;

            $('#monto_cuota').val(cuota.toFixed(2));
           $('#monto_cuota2').val(cuota.toFixed(2));
            $('#monto_inicial').val(montoPrestado.toFixed(2));
            $('#monto_interes').val(interesTotal.toFixed(2));
            $('#monto_final').val(totalCancelar.toFixed(2));
            $('#monto_total').val(totalCancelar.toFixed(2));

            // Mostrar los resultados en la alerta
            /*   alert(`Resultado del prestamo:
                          Monto Prestado: $${montoPrestado}
                          Porcentaje de Interés Fijo Total: $${(tasaFijaTotal * 100).toFixed(2)}%
                          Modalidad: $${modalidad}
                          Número de Cuotas: $${nroCuotas}
                          Interés Total: $${interesTotal.toFixed(2)}
                          Cuota por Pagar: $${cuota.toFixed(2)}
                          Total a Cancelar: $${totalCancelar.toFixed(2)}`); */
        }

        window.onload = function () {
            calcularPrestamo(); 
        }
    </script>


@stop
