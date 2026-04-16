<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">

<style>
@page {
    size: A4;
    margin: 0;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    font-size: 12px;
    color: #333;
}

/* MEDIA HOJA - SIN MARGIN NI PADDING EXTRA */
.comprobante {
    height: 14cm;
    padding: 15px 25px;
    page-break-inside: avoid;
}

/* LÍNEA DIVISORIA */
.comprobante.original {
    border-bottom: 2px dashed #999;
}

/* ENCABEZADO */
.header {
    width: 100%;
    margin-bottom: 8px;
}

.header table {
    width: 100%;
}

.logo {
    width: 80px;
}

.info-empresa {
    text-align: center;
    font-size: 10px;
    line-height: 1.3;
}

.nro-pago-col {
    text-align: right;
    font-size: 11px;
}

/* TÍTULO */
.titulo {
    text-align: center;
    text-transform: uppercase;
    font-size: 16px;
    font-weight: bold;
    text-decoration: underline;
    margin: 8px 0 12px;
}

/* TABLAS */
table {
    width: 100%;
    border-collapse: collapse;
}

.table-datos {
    margin-bottom: 10px;
}

.table-datos th {
    background: #f2f2f2;
    text-align: left;
    padding: 5px;
    border: 1px solid #ccc;
    width: 20%;
}

.table-datos td {
    padding: 5px;
    border: 1px solid #ccc;
}

.table-detalle th {
    background: #666;
    color: #fff;
    padding: 5px;
    border: 1px solid #333;
}

.table-detalle td {
    padding: 8px;
    border: 1px solid #333;
    text-align: center;
}

/* FIRMAS */
.footer-firmas {
    margin-top: 80px;
}

.firma-box {
    width: 45%;
    display: inline-block;
    text-align: center;
    border-top: 1px solid #000;
    margin: 0 2%;
    font-size: 11px;
    padding-top: 5px;
}
</style>
</head>

<body>

<!-- COMPROBANTE 1: ORIGINAL -->
<div class="comprobante original">
    <table class="header">
        <tr>
            <td width="20%">
                @if($configuracion->logo)
                    <img src="{{ public_path('storage/'.$configuracion->logo) }}" class="logo">
                @endif
            </td>

            <td class="info-empresa">
                <strong>{{ $configuracion->nombre }}</strong><br>
                {{ $configuracion->descripcion }}<br>
                {{ $configuracion->direccion }}<br>
                Telf: {{ $configuracion->telefono }}
            </td>

            <td width="25%" class="nro-pago-col">
                <strong>Nro de pago:</strong> {{ $pago->id }}<br>
                <span style="border:1px solid #000; padding:2px 5px;">ORIGINAL</span>
            </td>
        </tr>
    </table>

    <div class="titulo">Comprobante de Pago</div>

    <table class="table-datos">
        <tr>
            <th>Fecha de Pago:</th>
            <td>{{ \Carbon\Carbon::parse($pago->fecha_cancelado)->format('d/m/Y') }}</td>
            <th>Nro Documento:</th>
            <td>{{ $pago->prestamo->cliente->nro_documento }}</td>
        </tr>
        <tr>
            <th>Señor(es):</th>
            <td colspan="3">
                {{ $pago->prestamo->cliente->nombres }}
                {{ $pago->prestamo->cliente->apellidos }}
            </td>
        </tr>
    </table>

    <table class="table-detalle">
        <thead>
            <tr>
                <th width="10%">Item</th>
                <th>Detalle del Pago</th>
                <th width="30%">Monto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td style="text-align:left;">
                    <strong>Préstamo Nro:</strong> {{ $pago->prestamo_id }}<br>
                    <strong>Cuota programada:</strong>
                    {{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}<br>
                    <strong>Método:</strong> {{ $pago->metodo_pago }}
                    @if($pago->referencia_pago)
                        <br><strong>Referencia:</strong> {{ $pago->referencia_pago }}
                    @endif
                </td>
                <td>
                    {{ $configuracion->moneda }}
                    {{ number_format($pago->monto_pagado, 2) }}
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align:right; padding-right:10px;">
                    <strong>TOTAL CANCELADO:</strong>
                </td>
                <td style="background:#f2f2f2; font-size:14px;">
                    <strong>
                        {{ $configuracion->moneda }}
                        {{ number_format($pago->monto_pagado, 2) }}
                    </strong>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="footer-firmas">
        <div class="firma-box">
            {{ $configuracion->nombre }}<br>
            <small>Entregué conforme</small>
        </div>
        <div class="firma-box">
            {{ $pago->prestamo->cliente->nombres }}
            {{ $pago->prestamo->cliente->apellidos }}<br>
            <small>Recibí conforme (Cliente)</small>
        </div>
    </div>
</div>

<!-- COMPROBANTE 2: COPIA -->
<div class="comprobante">
    <table class="header">
        <tr>
            <td width="20%">
                @if($configuracion->logo)
                    <img src="{{ public_path('storage/'.$configuracion->logo) }}" class="logo">
                @endif
            </td>

            <td class="info-empresa">
                <strong>{{ $configuracion->nombre }}</strong><br>
                {{ $configuracion->descripcion }}<br>
                {{ $configuracion->direccion }}<br>
                Telf: {{ $configuracion->telefono }}
            </td>

            <td width="25%" class="nro-pago-col">
                <strong>Nro de pago:</strong> {{ $pago->id }}<br>
                <span style="border:1px solid #000; padding:2px 5px;">COPIA</span>
            </td>
        </tr>
    </table>

    <div class="titulo">Comprobante de Pago</div>

    <table class="table-datos">
        <tr>
            <th>Fecha de Pago:</th>
            <td>{{ \Carbon\Carbon::parse($pago->fecha_cancelado)->format('d/m/Y') }}</td>
            <th>Nro Documento:</th>
            <td>{{ $pago->prestamo->cliente->nro_documento }}</td>
        </tr>
        <tr>
            <th>Señor(es):</th>
            <td colspan="3">
                {{ $pago->prestamo->cliente->nombres }}
                {{ $pago->prestamo->cliente->apellidos }}
            </td>
        </tr>
    </table>

    <table class="table-detalle">
        <thead>
            <tr>
                <th width="10%">Item</th>
                <th>Detalle del Pago</th>
                <th width="30%">Monto</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td style="text-align:left;">
                    <strong>Préstamo Nro:</strong> {{ $pago->prestamo_id }}<br>
                    <strong>Cuota programada:</strong>
                    {{ \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y') }}<br>
                    <strong>Método:</strong> {{ $pago->metodo_pago }}
                    @if($pago->referencia_pago)
                        <br><strong>Referencia:</strong> {{ $pago->referencia_pago }}
                    @endif
                </td>
                <td>
                    {{ $configuracion->moneda }}
                    {{ number_format($pago->monto_pagado, 2) }}
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2" style="text-align:right; padding-right:10px;">
                    <strong>TOTAL CANCELADO:</strong>
                </td>
                <td style="background:#f2f2f2; font-size:14px;">
                    <strong>
                        {{ $configuracion->moneda }}
                        {{ number_format($pago->monto_pagado, 2) }}
                    </strong>
                </td>
            </tr>
        </tfoot>
    </table>

    <div class="footer-firmas">
        <div class="firma-box">
            {{ $configuracion->nombre }}<br>
            <small>Entregué conforme</small>
        </div>
        <div class="firma-box">
            {{ $pago->prestamo->cliente->nombres }}
            {{ $pago->prestamo->cliente->apellidos }}<br>
            <small>Recibí conforme (Cliente)</small>
        </div>
    </div>
</div>

</body>
</html>