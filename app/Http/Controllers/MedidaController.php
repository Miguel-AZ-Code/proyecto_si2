<?php

namespace App\Http\Controllers;

use App\Models\Medida;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class MedidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.medidas.index')->only('index');
        $this->middleware('can:admin.medidas.edit')->only('edit', 'update');
        $this->middleware('can:admin.medidas.create')->only('create', 'store');
        $this->middleware('can:admin.medidas.show')->only('show');
        $this->middleware('can:admin.medidas.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medidas = Medida::paginate();
        return view('medidas.index', compact('medidas'))
            ->with('i', (request()->input('page', 1) - 1) * $medidas->perPage());
    }

    public function pdf(){
            $medidas  =   Medida::paginate();
            $pdf    =   PDF::loadview('medidas.pdf',['users'=>$medidas]);
             /*  return $pdf->download('Usuarios.pdf');  */   //Opcion 1 
             return $pdf->stream();                         //opcion 2
         
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medidas = new Medida();
        return view('medidas.create', compact('medidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Medida::create($request->all());

        return redirect()->route('admin.medidas.index')
            ->with('success', 'Medida created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medidas = Medida::find($id);

        return view('medidas.show', compact('medidas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medidas = Medida::find($id);

        return view('medidas.edit', compact('medidas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medida $medida)
    {

        $medida->update($request->all());

        return redirect()->route('admin.medidas.index')
            ->with('success', 'Medida updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medida::find($id)->delete();

        return redirect()->route('admin.medidas.index')
            ->with('success', 'Medida deleted successfully');
    }
}
