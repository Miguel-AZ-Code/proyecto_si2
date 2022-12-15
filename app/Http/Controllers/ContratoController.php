<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Contrato;
use App\Models\Empleado;
use App\Models\Factura;
use App\Models\Presupuesto;
use App\Models\Proyecto;
use Illuminate\Http\Request;

/**
 * Class ContratoController
 * @package App\Http\Controllers
 */
class ContratoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.contratos.index')->only('index');
        $this->middleware('can:admin.contratos.edit')->only('edit', 'update');
        $this->middleware('can:admin.contratos.create')->only('create', 'store');
        $this->middleware('can:admin.contratos.show')->only('show');
        $this->middleware('can:admin.contratos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contratos = Contrato::with(['empleado', 'cliente', 'proyecto', 'presupuesto', 'factura'])->get();

        return view('contrato.index', compact('contratos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contrato = new Contrato();
        $empleados = Empleado::pluck('nombre', 'id');
        $clientes = Cliente::pluck('nombre', 'id');
        $proyectos = Proyecto::pluck('nombre', 'id');
        $presupuestos = Presupuesto::pluck('descripcion', 'id');
        $facturas = Factura::pluck('nit', 'id');
        return view('contrato.create', compact('contrato', 'empleados', 'clientes', 'proyectos', 'presupuestos', 'facturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contrato::$rules);

        $contrato = Contrato::create($request->all());

        return redirect()->route('contratos.index')
            ->with('success', 'Contrato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contrato = Contrato::find($id);

        return view('contrato.show', compact('contrato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contrato = Contrato::find($id);

        return view('contrato.edit', compact('contrato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contrato $contrato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contrato $contrato)
    {
        request()->validate(Contrato::$rules);

        $contrato->update($request->all());

        return redirect()->route('contratos.index')
            ->with('success', 'Contrato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contrato = Contrato::find($id)->delete();

        return redirect()->route('contratos.index')
            ->with('success', 'Contrato deleted successfully');
    }
}
