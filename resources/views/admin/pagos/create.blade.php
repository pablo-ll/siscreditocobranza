@extends('adminlte::page')

@section('content_header')
<h1><b> Pagos/Registro de cuotas</b></h1>
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

                    <div class="col-md-4">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos del cliente</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>
                                            <i class="fas fa-id-card"></i> {{ $prestamo->cliente->nro_documento }} <br><br>
                                            <i class="fas fa-user"></i> {{ $prestamo->cliente->apellidos }},
                                            {{ $prestamo->cliente->nombres }} <br><br>
                                            <i class="fas fa-calendar"></i> {{ $prestamo->cliente->fecha_nacimiento }} <br><br>
                                            <i class="fas fa-user-check"></i> {{ $prestamo->cliente->genero }} <br><br>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <i class="fas fa-envelope"></i> {{ $prestamo->cliente->email }} <br><br>
                                            <i class="fas fa-phone"></i> {{ $prestamo->cliente->celular }} <br><br>
                                            <i class="fas fa-phone"></i> {{ $prestamo->cliente->ref_celular }} <br><br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos del credito</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p>
                                            <b>Monto del credito</b> <br>
                                            <i class="fas fa-money-bill-wave"></i> {{ $prestamo->monto_prestado }} <br><br>
                                            <b>Tasa de interes</b> <br>
                                            <i class="fas fa-percentage"></i> {{ $prestamo->tasa_interes }} <br><br>

                                            <b>Monto Total</b> <br>
                                            <i class="fas fa-money-bill-alt"></i> {{ $prestamo->monto_total }} <br>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <b>Modalidad</b> <br>
                                        <i class="fas fa-calendar-alt"></i> {{ $prestamo->modalidad }} <br><br>
                                        <b>Nro de cuotas</b> <br>
                                        <i class="fas fa-list"></i> {{ $prestamo->nro_cuotas }} cuotas<br><br>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-8">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Cronograma de los pagos</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-sm table-striped table-hover table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">Nro de cuota</th>
                                                    <th style="text-align: center">Monto de la cuota</th>
                                                    <th style="text-align: center">Fecha de pago</th>
                                                    <th style="text-align: center">Pago</th>
                                                    <th style="text-align: center">Fecha cancelado</th>
                                                    <th style="text-align: center">Metodo de pago</th>
                                                    <th style="text-align: center">Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $contador = 1;
                                                @endphp
                                                @foreach ($pagos as $pago)
                                                <tr>
                                                    <td style="text-align: center">{{ $contador++ }}</td>
                                                    <td style="text-align: center">{{ $pago->monto_pagado }}</td>
                                                    <td style="text-align: center">{{ $pago->fecha_pago }}</td>
                                                    <td style="text-align: center">{{ $pago->estado }}</td>
                                                    <td style="text-align: center">{{ $pago->fecha_cancelado }}</td>
                                                    <td style="text-align: center">{{ $pago->metodo_pago }}</td>
                                                    <td style="text-align: center">
                                                        <div class="btn-group" prestamo="group" aria-label="Basic example">
                                                            @if($pago->estado=="Confirmado")
                                                            <button type="button" class="btn btn-primary btn-sm">Pagado</button>
                                                            <a href="{{ url('/admin/pagos/comprobante', $pago->id) }}"
                                                                style="border-radius: 4px" class="btn btn-dark btn-sm"><i
                                                                    class="fas fa-print"></i></a>

                                                            @else




                                                            <form action="{{ url('/admin/pagos/create', $pago->id) }}" method="post" id="form-delete-{{ $pago->id }}" style="display:inline;">
                                                                @csrf

                                                                <button type="button" class="btn btn-success btn-sm"
                                                                    data-id="{{ $pago->id }}"
                                                                    onclick="preguntar(this)">

                                                                    <i class="fas fa-money-bill">Pagar</i>
                                                                </button>
                                                            </form>





                                                            @endif
                                                        </div>


                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

@stop

@section('js')

<script>
    function preguntar(boton) {
        const id = boton.getAttribute('data-id');
        const ahora = new Date();
        const hoy = ahora.getFullYear() + '-' +
            String(ahora.getMonth() + 1).padStart(2, '0') + '-' +
            String(ahora.getDate()).padStart(2, '0');

        Swal.fire({
            title: 'Registrar Pago',
            html: `
            <div class="form-group">
                <label class="form-label">Métodos de Pago:</label>
                <select id="swal-metodo" class="form-control mb-2" multiple="multiple" style="width: 100%">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Transferencia bancaria">Transferencia bancaria</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Pago QR">Pago QR</option>
                    <option value="Yape">Yape</option>
                </select>

                <label class="form-label mt-2">Fecha de Cancelación:</label>
                <input type="date" id="swal-fecha" class="form-control" value="${hoy}">
            </div>
        `,
            showCancelButton: true,
            confirmButtonText: 'Confirmar Pago',
            confirmButtonColor: '#1637a5ff',
            didOpen: () => {
                $('#swal-metodo').select2({
                    theme: 'bootstrap4', // Para que combine con AdminLTE

                    allowClear: true,
                    dropdownParent: $('.swal2-container') // ¡ESTO ES VITAL!
                });
            },
            preConfirm: () => {
                // Obtenemos los valores a través de jQuery (más fácil con Select2)
                const metodos = $('#swal-metodo').val();
                const fecha = document.getElementById('swal-fecha').value;

                if (!metodos || metodos.length === 0) {
                    Swal.showValidationMessage('Selecciona al menos un método de pago');
                    return false;
                }
                if (!fecha) {
                    Swal.showValidationMessage('La fecha es obligatoria');
                    return false;
                }
                return {
                    metodos: metodos,
                    fecha: fecha
                };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const formulario = document.getElementById('form-delete-' + id);

                // Agregamos cada método seleccionado como un input oculto
                result.value.metodos.forEach(metodo => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'metodo_pago[]';
                    input.value = metodo;
                    formulario.appendChild(input);
                });

                const inputFecha = document.createElement('input');
                inputFecha.type = 'hidden';
                inputFecha.name = 'fecha_cancelado';
                inputFecha.value = result.value.fecha;
                formulario.appendChild(inputFecha);

                formulario.submit();
            }
        });
    }
</script>


@stop