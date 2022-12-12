<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.proveedores.index')->only('index');
        $this->middleware('can:admin.proveedores.edit')->only('edit', 'update');
        $this->middleware('can:admin.proveedores.create')->only('create', 'store');
        $this->middleware('can:admin.proveedores.show')->only('show');
        $this->middleware('can:admin.proveedores.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::paginate();

        return view('proveedores.index', compact('proveedores'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $proveedore = new Proveedor();
        return view('proveedores.create', compact('proveedore'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Proveedore::$rules);
        $request->validate([
            'nit' => 'required|unique:proveedors', // validar datos unicos
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
        Proveedor::create($request->all());

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedore created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedore = Proveedor::find($id);

        return view('admin.proveedores.show', compact('proveedore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedore = Proveedor::find($id);

        return view('proveedores.edit', compact('proveedore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedor $proveedore)
    {
        $request->validate([
            'nit' => 'required', // validar datos unicos
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
        ]);
        $proveedore->update($request->all());

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedore updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Proveedor::find($id)->delete();

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedore deleted successfully');
    }
}

