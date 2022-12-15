<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use App\Models\Metodo;
use Illuminate\Http\Request;

/**
 * Class FacturaController
 * @package App\Http\Controllers
 */
class FacturaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.facturas.index')->only('index');
        $this->middleware('can:admin.facturas.edit')->only('edit', 'update');
        $this->middleware('can:admin.facturas.create')->only('create', 'store');
        $this->middleware('can:admin.facturas.show')->only('show');
        $this->middleware('can:admin.facturas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facturas = Factura::with(['metodo'])->get();

        return view('factura.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factura = new Factura();
        $metodos = Metodo::pluck('nombre', 'id');
        return view('factura.create', compact('factura', 'metodos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Factura::$rules);

        $factura = Factura::create($request->all());

        return redirect()->route('facturas.index')
            ->with('success', 'Factura created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura = Factura::find($id);

        return view('factura.show', compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::find($id);

        return view('factura.edit', compact('factura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Factura $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        request()->validate(Factura::$rules);

        $factura->update($request->all());

        return redirect()->route('facturas.index')
            ->with('success', 'Factura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $factura = Factura::find($id)->delete();

        return redirect()->route('facturas.index')
            ->with('success', 'Factura deleted successfully');
    }
}
