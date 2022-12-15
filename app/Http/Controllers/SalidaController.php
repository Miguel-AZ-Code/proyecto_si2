<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Materiale;
use App\Models\Salida;
use Illuminate\Http\Request;

/**
 * Class SalidaController
 * @package App\Http\Controllers
 */
class SalidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.salidas.index')->only('index');
        $this->middleware('can:admin.salidas.edit')->only('edit', 'update');
        $this->middleware('can:admin.salidas.create')->only('create', 'store');
        $this->middleware('can:admin.salidas.show')->only('show');
        $this->middleware('can:admin.salidas.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salidas = Salida::with(['empleado', 'materiales'])->get();

        return view('salida.index', compact('salidas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salida = new Salida();
        $empleados = Empleado::pluck('nombre', 'id');
        $materiales = Materiale::pluck('nombre', 'id');
        return view('salida.create', compact('salida', 'materiales', 'empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Salida::$rules);

        $salida = Salida::create($request->all());
        $salida->materiales()->sync($request->input('materiales', []));

        return redirect()->route('salidas.index')
            ->with('success', 'Salida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salida = Salida::find($id);

        return view('salida.show', compact('salida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salida = Salida::find($id);

        return view('salida.edit', compact('salida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Salida $salida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salida $salida)
    {
        request()->validate(Salida::$rules);

        $salida->update($request->all());

        return redirect()->route('salidas.index')
            ->with('success', 'Salida updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $salida = Salida::find($id)->delete();

        return redirect()->route('salidas.index')
            ->with('success', 'Salida deleted successfully');
    }
}
