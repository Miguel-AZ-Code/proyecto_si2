<?php

namespace App\Http\Controllers;

use App\Models\Cargoempleado;
use Illuminate\Http\Request;
use App\Models\Cargo;
use App\Models\Persona;

class CargoempleadoController extends Controller
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

        $cargoempleados = Cargoempleado::paginate();
       // $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $personas= Persona::select('nombre','id')->where('T_E','0')->get();//  ojo revisar :v
        $cargos=Cargo::all();
      //$cargo=Cargo::pluck('nombre','id');
        return view('cargoempleados.index', compact('personas','cargos','cargoempleados'))
        ->with('i', (request()->input('page', 1) - 1) * $cargoempleados->perPage());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cargoempleado = new Cargoempleado();
        //$persona= Persona::select('nombre','id')->where('T_E','0')->get();
        $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $cargos=Cargo::pluck('nombre','id');
        return view('cargoempleados.create', compact('cargoempleado','personas','cargos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


      Cargoempleado::create($request->all());

        return redirect()->route('admin.contratos.index')
            ->with('success', 'Cargoempleado created successfully.');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //hacer una mejor consulta y mandarlo desde aqui para mostrar
        $cargoempleado = Cargoempleado::find($id);
        $personas= Persona::select('nombre','id')->where('T_E','0')->get();//  ojo revisar :v
        $cargos=Cargo::all();

        return view('cargoempleados.show', compact('cargoempleado','personas','cargos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargoempleado = Cargoempleado::find($id);
        $personas=Persona::where('T_E','0')->pluck('nombre','id');
        $cargos=Cargo::pluck('nombre','id');

        return view('cargoempleados.edit', compact('cargoempleado','personas','cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $cargoempleado=Cargoempleado::find($id);
        $cargoempleado->update($request->all());

        return redirect()->route('admin.contratos.index')
            ->with('success', 'Cargoempleado updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cargoempleado::find($id)->delete();

        return redirect()->route('admin.contratos.index')
            ->with('success', 'Cargoempleado deleted successfully');
    }
}
