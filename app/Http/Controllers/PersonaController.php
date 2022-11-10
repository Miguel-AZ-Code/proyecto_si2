<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.personas.index')->only('index');
        $this->middleware('can:admin.personas.edit')->only('edit', 'update');
        $this->middleware('can:admin.personas.create')->only('create', 'store');
        $this->middleware('can:admin.personas.show')->only('show');
        $this->middleware('can:admin.personas.destroy')->only('destroy');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::paginate();

        return view('personas.index', compact('personas'))
            ->with('i', (request()->input('page', 1) - 1) * $personas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $persona = new Persona();
        return view('personas.create', compact('persona'));
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
            'ci'=>'required',
            'nombre' => 'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'nit'=>'required',
            'tipo'=>'required',
            'fecha_nacimiento'=>'required',
		     'T_C' => 'required',
		     'T_E' => 'required',
        ]);

         Persona::create($request->all());

        return redirect()->route('admin.personas.index')
            ->with('success', 'Persona created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persona = Persona::find($id);

        return view('personas.show', compact('persona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persona = Persona::find($id);

        return view('personas.edit', compact('persona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'ci'=>'required',
            'nombre' => 'required',
            'telefono'=>'required',
            'direccion'=>'required',
            'nit'=>'required',
            'tipo'=>'required',
            'fecha_nacimiento'=>'required',
		     'T_C' => 'required',
		     'T_E' => 'required',
        ]);

        $persona->update($request->all());

        return redirect()->route('admin.personas.index')
            ->with('success', 'Persona updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Persona::find($id)->delete();

        return redirect()->route('admin.personas.index')
            ->with('success', 'Persona deleted successfully');
    }
}
