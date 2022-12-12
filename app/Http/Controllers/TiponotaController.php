<?php

namespace App\Http\Controllers;

use App\Models\Tiponota;
use Illuminate\Http\Request;

class TiponotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tiponotas.index')->only('index');
        $this->middleware('can:admin.tiponotas.create')->only('create', 'store');
        $this->middleware('can:admin.tiponotas.show')->only('show');
        $this->middleware('can:admin.tiponotas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiponotas=Tiponota::paginate();
        return view('tiponotas.index',compact('tiponotas'))
         ->with('i', (request()->input('page', 1) - 1) * $tiponotas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiponotas= new Tiponota();
        return view('tiponotas.create',compact('tiponotas'));
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

         Tiponota::create($request->all());

        return redirect()->route('admin.tiponotas.index')
            ->with('success', 'Persona created successfully.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tiponota  $tiponota
     * @return \Illuminate\Http\Response
     */
    public function show(Tiponota $tiponota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tiponota  $tiponota
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $tiponotas = Tiponota::find($id);

        return view('tiponotas.edit', compact('tiponotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tiponota  $tiponota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tiponota $tiponota)
    {
        $request->validate([

            'nombre' => 'required',

        ]);

        $tiponota->update($request->all());

        return redirect()->route('admin.tiponotas.index')
            ->with('success', 'Persona updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tiponota  $tiponota
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        Tiponota::find($id)->delete();

        return redirect()->route('admin.tiponotas.index')
            ->with('success', 'Persona deleted successfully');
    }
}
