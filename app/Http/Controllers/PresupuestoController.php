<?php

namespace App\Http\Controllers;

use App\Models\Presupuesto;
use App\Models\Servicio;
use Illuminate\Http\Request;

/**
 * Class PresupuestoController
 * @package App\Http\Controllers
 */
class PresupuestoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.presupuestos.index')->only('index');
        $this->middleware('can:admin.presupuestos.edit')->only('edit', 'update');
        $this->middleware('can:admin.presupuestos.create')->only('create', 'store');
        $this->middleware('can:admin.presupuestos.show')->only('show');
        $this->middleware('can:admin.presupuestos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presupuestos = Presupuesto::with(['servicios'])->get();

        return view('presupuesto.index', compact('presupuestos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $presupuesto = new Presupuesto();
        $servicios = Servicio::pluck('nombre', 'id');
        return view('presupuesto.create', compact('presupuesto', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Presupuesto::$rules);

        $presupuesto = Presupuesto::create($request->all());
        $presupuesto->servicios()->sync($request->input('servicios', []));

        return redirect()->route('presupuestos.index')
            ->with('success', 'Presupuesto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $presupuesto = Presupuesto::find($id);

        return view('presupuesto.show', compact('presupuesto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $presupuesto = Presupuesto::find($id);

        return view('presupuesto.edit', compact('presupuesto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Presupuesto $presupuesto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Presupuesto $presupuesto)
    {
        request()->validate(Presupuesto::$rules);

        $presupuesto->update($request->all());

        return redirect()->route('presupuestos.index')
            ->with('success', 'Presupuesto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $presupuesto = Presupuesto::find($id)->delete();

        return redirect()->route('presupuestos.index')
            ->with('success', 'Presupuesto deleted successfully');
    }
}
