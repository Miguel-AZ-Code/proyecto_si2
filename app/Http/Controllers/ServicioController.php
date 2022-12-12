<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.servicios.index')->only('index');
        $this->middleware('can:admin.servicios.edit')->only('edit', 'update');
        $this->middleware('can:admin.servicios.create')->only('create', 'store');
        $this->middleware('can:admin.servicios.show')->only('show');
        $this->middleware('can:admin.servicios.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicio::paginate();

        return view('servicios.index', compact('servicios'))
            ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = new Servicio();
        return view('servicios.create', compact('servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Servicio::create($request->all()); //insert

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servicios = Servicio::find($id);

        return view('servicios.show', compact('servicios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $servicios = Servicio::find($id);

        return view('servicios.edit', compact('servicios'));
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

        $servicio = Servicio::find($id);

        $servicio->update($request->all());

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Servicio::find($id)->delete();

        return redirect()->route('admin.servicios.index')
            ->with('success', 'Servicio deleted successfully');
    }
}

