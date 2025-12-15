<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contrato de Mutuo Simple</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Usamos Arial o Sans-serif, más limpio */
            margin: 2cm 2.5cm; /* Márgenes amplios y equilibrados */
            line-height: 1.6;
            font-size: 10pt;
            color: #333; /* Color de texto suave */
        }

        /* --- Estilos Generales --- */
        .section-separator {
            border: none;
            border-top: 1px solid #ccc; /* Línea de separación suave */
            margin: 10px 0 20px 0;
        }

        /* --- Títulos y Encabezados --- */
        .header-table {
            width: 100%;
            margin-bottom: 30px;
        }

        .document-title {
            text-align: center;
            font-size: 14pt;
            font-weight: bold;
            margin-bottom: 35px;
            padding-bottom: 5px;
            border-bottom: 2px solid #333; /* Línea de título más marcada */
        }

        .section-title {
            font-size: 11pt;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 10px;
        }
        
        .clause-text {
            text-align: justify;
            margin-bottom: 15px;
        }
        
        /* --- Tablas de Datos (Sin Bordes, Minimalista) --- */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .data-table td {
            padding: 5px 10px;
            vertical-align: top;
            /* Eliminamos los bordes */
        }

        .data-table .label {
            font-weight: bold;
            width: 30%;
            padding-left: 0;
        }

        /* --- Tabla de Cronograma (Bordes solo internos, líneas claras) --- */
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            border: 1px solid #ddd;
        }
        
        .schedule-table thead th {
            background-color: #f8f8f8; /* Fondo muy claro */
            color: #333;
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 9pt;
        }
        
        .schedule-table tbody td {
            padding: 6px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 9pt;
        }

        /* --- Firmas (Horizontal) --- */
        .footer-signature {
            margin-top: 100px;
            width: 100%;
            display: table; /* Usamos display:table para control horizontal */
            table-layout: fixed;
        }
        
        .signature-block {
            display: table-cell;
            text-align: center;
            width: 50%;
        }

        .signature-line {
            display: inline-block;
            width: 80%; /* Ancho de la línea */
            border-top: 1px solid #000000;
            padding-top: 5px;
            margin-top: 10px;
        }

    </style>
</head>

<body>

    {{-- ================================================= --}}
    {{-- 1. ENCABEZADO Y TÍTULO DEL DOCUMENTO --}}
    {{-- ================================================= --}}
    <table class="header-table">
        <tr>
            <td style="width: 30%;">
                <img src="{{ public_path('/storage/' . $configuracion->logo) }}" width="70px" alt="Logo Empresa">
            </td>
            <td style="width: 70%; text-align: right; font-size: 8pt; color: #555;">
                **{{ strtoupper($configuracion->nombre) }}** <br>
                {{ $configuracion->direccion }} | Tel: {{ $configuracion->telefono }} <br>
                Email: {{ $configuracion->email }}
            </td>
        </tr>
    </table>

    <div class="document-title">
        CONTRATO DE MUTUO SIMPLE NO. ID{{ $prestamo->id }}
    </div>

    {{-- ================================================= --}}
    {{-- 2. DATOS DE LAS PARTES --}}
    {{-- ================================================= --}}
    <div class="section-title">I. DATOS DE LAS PARTES Y DECLARACIONES</div>
    <hr class="section-separator">

    <p class="clause-text">
        **A. EL MUTUANTE (ACREEDOR):** La entidad **{{ $configuracion->nombre }}**, con domicilio en {{ $configuracion->direccion }}, declara su voluntad de otorgar el presente mutuo simple.
        <br><br>
        **B. EL MUTUARIO (DEUDOR):** La persona natural cuyos datos se detallan a continuación, declara bajo juramento que la información proporcionada es verídica y acepta las obligaciones del presente contrato.
    </p>

    {{-- Tabla de Datos del Cliente (Minimalista, sin bordes) --}}
    <table class="data-table">
        <tr>
            <td class="label">Nombre Completo:</td>
            <td>{{ $prestamo->cliente->apellidos }}, {{ $prestamo->cliente->nombres }}</td>
            <td class="label">Documento:</td>
            <td>{{ $prestamo->cliente->nro_documento }}</td>
        </tr>
        <tr>
            <td class="label">Celular:</td>
            <td>{{ $prestamo->cliente->celular }}</td>
            <td class="label">Correo Electrónico:</td>
            <td>{{ $prestamo->cliente->email }}</td>
        </tr>
        <tr>
             <td class="label">Celular referencia:</td>
            <td>{{ $prestamo->cliente->ref_celular }}</td>

        </tr>
    </table>


    {{-- ================================================= --}}
    {{-- 3. CLÁUSULAS DEL PRÉSTAMO --}}
    {{-- ================================================= --}}
    <div class="section-title">II. OBJETO Y CONDICIONES FINANCIERAS</div>
    <hr class="section-separator">

    <p class="clause-text">
        **CLÁUSULA PRIMERA (MONTO Y TASA):** EL MUTUANTE entrega a EL MUTUARIO la suma principal de **{{ $configuracion->moneda }}. {{ number_format($prestamo->monto_prestado, 2) }}**. Este monto devengará una Tasa de Interés Nominal del **{{ $prestamo->tasa_interes }}%**, resultando en un Monto Total a Pagar de **{{ $configuracion->moneda }}. {{ number_format($prestamo->monto_total, 2) }}**.
    </p>

    <p class="clause-text">
        **CLÁUSULA SEGUNDA (PLAZO):** EL MUTUARIO se compromete a restituir el monto total en **{{ $prestamo->nro_cuotas }}** cuotas, bajo la modalidad de pago **{{ $prestamo->modalidad }}**, según el cronograma detallado en la Sección III.
    </p>


    {{-- ================================================= --}}
    {{-- 4. CRONOGRAMA DE PAGOS --}}
    {{-- ================================================= --}}
    <div class="section-title">III. CRONOGRAMA DE PAGOS</div>
    <hr class="section-separator">

    <table class="schedule-table" cellpadding="5">
        <thead>
            <tr>
                <th>Nro de Cuota</th>
                <th>Fecha de Vencimiento</th>
                <th>Monto</th>
                <th>Estado Inicial</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contador = 1;
            @endphp
            @foreach ($pagos as $pago)
            <tr>
                <td>{{ $contador++ }}</td>
                <td>{{ date('d/m/Y', strtotime($pago->fecha_pago)) }}</td>
                <td>{{ $configuracion->moneda }}. {{ number_format($pago->monto_pagado, 2) }}</td>
                <td>{{ $pago->estado }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

     <p class="clause-text">
        **CLÁUSULA TERCERA (ACEPTACIÓN):** Ambas partes aceptan las obligaciones y condiciones aquí establecidas, manifestando su conformidad con el presente contrato en [Ciudad/País], a los [Día] días del mes de [Mes] de [Año].
    </p>


    {{-- ================================================= --}}
    {{-- 5. FIRMAS HORIZONTALES --}}
    {{-- ================================================= --}}
    <div class="footer-signature">
        
        {{-- Bloque de Firma del MUTUANTE (Izquierda) --}}
        <div class="signature-block">
            <span class="signature-line"></span><br>
            **{{ strtoupper($configuracion->nombre) }}** <br>
            EL MUTUANTE (ACREEDOR)
        </div>

        {{-- Bloque de Firma del MUTUARIO (Derecha) --}}
        <div class="signature-block">
            <span class="signature-line"></span><br>
            **{{ $prestamo->cliente->nombres }} {{ $prestamo->cliente->apellidos }}** <br>
            EL MUTUARIO (DEUDOR)
        </div>
    </div>

    

</body>

</html>
