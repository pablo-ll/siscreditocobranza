<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Configuracion;
use App\Models\Pago;
use App\Models\Prestamo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::All();
        foreach ($prestamos as $prestamo) {
            $prestamo->tiene_cuota_pagada = Pago::whereNotNull('fecha_cancelado')
            ->where('prestamo_id', $prestamo->id)
            ->exists();
        }
        return view('admin.prestamos.index', compact('prestamos'));
    }

    public function obtenerCliente($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['error'=>'Cliente no encontrado']);
        }

        return response()->json($cliente);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('admin.prestamos.create', compact ('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store (Request $request)
        {
           // $datos = request()->all();
           // return response()->json($datos);
             $request->validate([
                'cliente_id' => 'required',
                'monto_prestado' => 'required',
                'tasa_interes' => 'required',
                'modalidad' => 'required',
                'nro_cuotas' => 'required',
                'fecha_inicio' => 'required',
                'monto_total' => 'required',
                'monto_cuota' => 'required',
            ]);

            $prestamo = new Prestamo();
            $prestamo->cliente_id = $request->cliente_id;
            $prestamo->monto_prestado = $request->monto_prestado;
            $prestamo->tasa_interes = $request->tasa_interes;
            $prestamo->modalidad = $request->modalidad;
            $prestamo->nro_cuotas = $request->nro_cuotas;
            $prestamo->fecha_inicio = $request->fecha_inicio;
            $prestamo->monto_total = $request->monto_total;
            $prestamo->save();


            for ($i = 1; $i <= $request->nro_cuotas; $i++) {
                $pago = new Pago();
                $pago->prestamo_id = $prestamo->id;
                $pago->monto_pagado = $request->monto_cuota;

                $fechaInicio = Carbon::parse($request->fecha_inicio);
                $fechaVencimiento = $fechaInicio->copy(); // Inicialmente, la fecha de vencimiento es la fecha de inicio

                // LÓGICA DE MODIFICACIÓN:
                if ($i === 1) {
                    // CUOTA 1: Se paga en el día de inicio del préstamo.
                    // La fecha de vencimiento ya está seteada a $fechaInicio->copy()
                    // No se necesita aplicar ningún 'addDays', 'addWeeks', etc.
                } else {
                    // CUOTAS 2 en adelante: Se calcula la fecha normal, pero usando ($i - 1)
                    // para asegurar que el intervalo se mida a partir del segundo pago.
                    
                    // La variable $i - 1 representa el número de período que se está CALCULANDO
                    // después del primer pago (Cuota 1).
                    $j = $i - 1; 

                    switch ($request->modalidad) {
                        case 'Diario':
                            $fechaVencimiento = $fechaInicio->copy()->addDays($j);
                            break;
                        case 'Semanal':
                            $fechaVencimiento = $fechaInicio->copy()->addWeeks($j);
                            break;
                        case 'Quincenal':
                            // Se resta 1 porque el pago 1 ya se hizo en el día 0
                            $fechaVencimiento = $fechaInicio->copy()->addWeeks($j * 2);
                            break;
                        case 'Mensual':
                            $fechaVencimiento = $fechaInicio->copy()->addMonths($j);
                            break;
                        case 'Anual':
                            $fechaVencimiento = $fechaInicio->copy()->addYears($j);
                            break;
                    }
                }
                // FIN LÓGICA DE MODIFICACIÓN

                $pago->fecha_pago = $fechaVencimiento;
                $pago->metodo_pago = "Efectivo";
                $pago->referencia_pago = "Pago de la cuota " . $i;
                $pago->estado = "Pendiente";
                
                
                $pago->save();
            }

            return redirect()->route('admin.prestamos.index')
                ->with('mensaje', 'Se registro el prestamos del cliente de la manera correcta')
                ->with('icono', 'success'); 
        }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         $prestamo = Prestamo::find($id);
         $pagos = Pago:: where('prestamo_id', $prestamo->id)->get();
        return view ('admin.prestamos.show', compact('prestamo', 'pagos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $prestamo = Prestamo::find($id);
        $clientes = Cliente::all();
        return view('admin.prestamos.edit', compact('prestamo','clientes')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
            $request->validate([
                'cliente_id' => 'required',
                'monto_prestado' => 'required',
                'tasa_interes' => 'required',
                'modalidad' => 'required',
                'nro_cuotas' => 'required',
                'fecha_inicio' => 'required',
                'monto_total' => 'required',
                'monto_cuota' => 'required',
            ]);
            $prestamo = Prestamo::find($id);
            $prestamo->cliente_id = $request->cliente_id;
            $prestamo->monto_prestado = $request->monto_prestado;
            $prestamo->tasa_interes = $request->tasa_interes;
            $prestamo->modalidad = $request->modalidad;
            $prestamo->nro_cuotas = $request->nro_cuotas;
            $prestamo->fecha_inicio = $request->fecha_inicio;
            $prestamo->monto_total = $request->monto_total;
            $prestamo->save();

            Pago::where('prestamo_id', $id)->delete();

             for ($i = 1; $i <= $request->nro_cuotas; $i++) {
                $pago = new Pago();
                $pago->prestamo_id = $prestamo->id;
                $pago->monto_pagado = $request->monto_cuota;

                $fechaInicio = Carbon::parse($request->fecha_inicio);
                $fechaVencimiento = $fechaInicio->copy(); // Inicialmente, la fecha de vencimiento es la fecha de inicio

                // LÓGICA DE MODIFICACIÓN:
                if ($i === 1) {
                    // CUOTA 1: Se paga en el día de inicio del préstamo.
                    // La fecha de vencimiento ya está seteada a $fechaInicio->copy()
                    // No se necesita aplicar ningún 'addDays', 'addWeeks', etc.
                } else {
                    // CUOTAS 2 en adelante: Se calcula la fecha normal, pero usando ($i - 1)
                    // para asegurar que el intervalo se mida a partir del segundo pago.
                    
                    // La variable $i - 1 representa el número de período que se está CALCULANDO
                    // después del primer pago (Cuota 1).
                    $j = $i - 1; 

                    switch ($request->modalidad) {
                        case 'Diario':
                            $fechaVencimiento = $fechaInicio->copy()->addDays($j);
                            break;
                        case 'Semanal':
                            $fechaVencimiento = $fechaInicio->copy()->addWeeks($j);
                            break;
                        case 'Quincenal':
                            // Se resta 1 porque el pago 1 ya se hizo en el día 0
                            $fechaVencimiento = $fechaInicio->copy()->addWeeks($j * 2);
                            break;
                        case 'Mensual':
                            $fechaVencimiento = $fechaInicio->copy()->addMonths($j);
                            break;
                        case 'Anual':
                            $fechaVencimiento = $fechaInicio->copy()->addYears($j);
                            break;
                    }
                }
                // FIN LÓGICA DE MODIFICACIÓN

                $pago->fecha_pago = $fechaVencimiento;
                $pago->metodo_pago = "Efectivo";
                $pago->referencia_pago = "Pago de la cuota " . $i;
                $pago->estado = "Pendiente";
                
                
                $pago->save();
            }

             return redirect()->route('admin.prestamos.index')
                ->with('mensaje', 'Se actualizo el credito del cliente de la manera correcta')
                ->with('icono', 'success'); 

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        Prestamo::destroy($id);
           return redirect()->route('admin.prestamos.index')
                ->with('mensaje', 'Se elimino el credito del cliente de la manera correcta')
                ->with('icono', 'success'); 
    }


    public function contratos ($id){

        $configuracion=Configuracion::latest()->first();//trae el ultimo registro de los registros

         $prestamo = Prestamo::find($id);
         $pagos = Pago:: where('prestamo_id', $prestamo->id)->get();
         $pdf= PDF::loadView('admin.prestamos.contratos', compact('prestamo', 'pagos', 'configuracion'));
         return $pdf->stream();

       // return view ('admin.prestamos.contratos', compact('prestamo', 'pagos'));

    }
}
