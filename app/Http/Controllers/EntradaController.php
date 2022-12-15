<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Entrada;
use App\Models\Materiale;
use App\Models\Proveedore;
use Illuminate\Http\Request;

/**
 * Class EntradaController
 * @package App\Http\Controllers
 */
class EntradaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.entradas.index')->only('index');
        $this->middleware('can:admin.entradas.edit')->only('edit', 'update');
        $this->middleware('can:admin.entradas.create')->only('create', 'store');
        $this->middleware('can:admin.entradas.show')->only('show');
        $this->middleware('can:admin.entradas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entradas = Entrada::with(['empleado', 'proveedore', 'materiales'])->get();

        return view('entrada.index', compact('entradas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $entrada = new Entrada();
        $empleados = Empleado::pluck('nombre', 'id');
        $proveedores = Proveedore::pluck('empresa', 'id');
        $materiales = Materiale::pluck('nombre', 'id');
        return view('entrada.create', compact('entrada', 'empleados', 'proveedores', 'materiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Entrada::$rules);

        $entrada = Entrada::create($request->all());
        $entrada->materiales()->sync($request->input('materiales', []));

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.show', compact('entrada'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrada = Entrada::find($id);

        return view('entrada.edit', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Entrada $entrada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entrada $entrada)
    {
        request()->validate(Entrada::$rules);

        $entrada->update($request->all());

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $entrada = Entrada::find($id)->delete();

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada deleted successfully');
    }
}
