<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\Medida;
use App\Models\Marca;

class MaterialController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.materiales.index')->only('index');
        $this->middleware('can:admin.materiales.edit')->only('edit', 'update');
        $this->middleware('can:admin.materiales.create')->only('create', 'store');
        $this->middleware('can:admin.materiales.show')->only('show');
        $this->middleware('can:admin.materiales.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materiales = Material::paginate();

        return view('materiales.index', compact('materiales'))
            ->with('i', (request()->input('page', 1) - 1) * $materiales->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materiales = new Material();
        $marcas= Marca::pluck('nombre','id');//consulta la base de datos utilizando nombre y id
        $medidas= Medida::pluck('unidad','id');//consulta la base de datos utilizando nombre y id
        return view('materiales.create', compact('materiales','marcas','medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Material::create($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('success', 'Material created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $materiales = Material::find($id);
        // $marcas= Marca::pluck('nombre','id');//consulta la base de datos utilizando nombre y id
        // $medidas= Medida::pluck('unidad','id');
        return view('materiales.show', compact('materiales'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materiales = Material::find($id);
        $marcas= Marca::pluck('nombre','id');//consulta la base de datos utilizando nombre y id
        $medidas= Medida::pluck('unidad','id');
        return view('materiales.edit', compact('materiales','marcas','medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

         $material=Material::find($id);
        $material->update($request->all());

        return redirect()->route('admin.materiales.index')
            ->with('success', 'material updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Material::find($id)->delete();

        return redirect()->route('admin.materiales.index')
            ->with('success', 'Material deleted successfully');
    }
}
