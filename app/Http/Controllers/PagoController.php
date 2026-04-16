<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Configuracion;
use App\Models\Prestamo;
use Barryvdh\DomPDF\Facade\Pdf;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        $pagos = Pago::where('estado', "Confirmado")->get();
        return view('admin.pagos.index', compact('pagos', 'clientes'));
    }

    public function cargar_prestamos_cliente($id)
    {


        $cliente = Cliente::find($id);
        $prestamos = Prestamo::where('cliente_id', $cliente->id)->get();

        return view('admin.pagos.cargar_prestamos_cliente', compact('cliente', 'prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $prestamo = Prestamo::find($id);
        $pagos = Pago::where('prestamo_id', $id)->get();
        return view('admin.pagos.create', compact('prestamo', 'pagos'));
    }

    public function cargar_datos($id)
    {
        $datoscliente = Cliente::find($id);
        $clientes = Cliente::all();
        //  $prestamo = Prestamo::find($id);
        //  $pagos = Pago:: where('prestamo_id', $prestamo->id)->get();
        return view('admin.pagos.cargar_datos', compact('datoscliente', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $pago = Pago::findOrFail($id);

        // Convertimos el array de métodos en una sola cadena de texto
        // Ejemplo: "Efectivo, Transferencia bancaria"
        $metodosString = implode(', ', $request->input('metodo_pago'));

        $pago->estado = "Confirmado";
        $pago->metodo_pago = $metodosString;
        $pago->fecha_cancelado = $request->fecha_cancelado;
        $pago->save();

        return redirect()->back()->with('mensaje', 'Pago registrado con éxito');
    }
    /**
     * Display the specified resource.
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pago $pago)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pago $pago)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pago $pago)
    {
        //
    }

   public function comprobante($id)
{
    // 1. Traer la configuración
    $configuracion = Configuracion::latest()->first();

    // 2. Buscar el pago específico con sus relaciones (Eager Loading)
    // Buscamos el pago, cargamos el préstamo y, dentro del préstamo, al cliente
    $pago = Pago::with(['prestamo.cliente'])->findOrFail($id);

    // 3. Obtenemos el préstamo directamente desde el pago
    $prestamo = $pago->prestamo;

    // 4. Generamos el PDF pasando la variable $pago individual
    $pdf = PDF::loadView('admin.pagos.comprobante', compact('pago', 'prestamo', 'configuracion'));
    
    return $pdf->stream('comprobante-pago-'.$id.'.pdf');
}
}
