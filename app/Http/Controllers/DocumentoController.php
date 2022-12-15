<?php

namespace App\Http\Controllers;

use App\Models\Contrato;
use App\Models\Documento;
use Illuminate\Http\Request;

/**
 * Class DocumentoController
 * @package App\Http\Controllers
 */
class DocumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.documentos.index')->only('index');
        $this->middleware('can:admin.documentos.edit')->only('edit', 'update');
        $this->middleware('can:admin.documentos.create')->only('create', 'store');
        $this->middleware('can:admin.documentos.show')->only('show');
        $this->middleware('can:admin.documentos.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documento::with(['contrato'])->get();

        return view('documento.index', compact('documentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documento = new Documento();
        $contratos = Contrato::pluck('descripcion', 'id');
        return view('documento.create', compact('documento', 'contratos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Documento::$rules);

        $documento = Documento::create($request->all());

        return redirect()->route('documentos.index')
            ->with('success', 'Documento created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $documento = Documento::find($id);

        return view('documento.show', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $documento = Documento::find($id);

        return view('documento.edit', compact('documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Documento $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        request()->validate(Documento::$rules);

        $documento->update($request->all());

        return redirect()->route('documentos.index')
            ->with('success', 'Documento updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $documento = Documento::find($id)->delete();

        return redirect()->route('documentos.index')
            ->with('success', 'Documento deleted successfully');
    }
}
