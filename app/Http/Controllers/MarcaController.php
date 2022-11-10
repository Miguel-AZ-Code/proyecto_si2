<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.marcas.index')->only('index');
        $this->middleware('can:admin.marcas.edit')->only('edit', 'update');
        $this->middleware('can:admin.marcas.create')->only('create', 'store');
        $this->middleware('can:admin.marcas.show')->only('show');
        $this->middleware('can:admin.marcas.destroy')->only('destroy');
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return view('marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'nombre' => 'required',
        ]);
        $marca = Marca::Create([
            'nombre' => $request->nombre,
        ]);
        return redirect()->route('admin.marcas.index')->with('info', 'La Marca se ha registrado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  Marca $marca)
    {
        $request->validate([
            'nombre' => 'required',
        ]);
        $marca->update($request->all());
        return redirect()->route('admin.marcas.edit', $marca)->with('info', 'Los Datos se Editaron correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Marca $marca)
    {
        $marca->delete();

        return back()->with('info','La Marca ha sido eliminada correctamente');
    }
}
