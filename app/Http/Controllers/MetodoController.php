<?php

namespace App\Http\Controllers;

use App\Models\Metodo;
use Illuminate\Http\Request;

/**
 * Class MetodoController
 * @package App\Http\Controllers
 */
class MetodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodos = Metodo::paginate();

        return view('metodo.index', compact('metodos'))
            ->with('i', (request()->input('page', 1) - 1) * $metodos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $metodo = new Metodo();
        return view('metodo.create', compact('metodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Metodo::$rules);

        $metodo = Metodo::create($request->all());

        return redirect()->route('metodos.index')
            ->with('success', 'Metodo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $metodo = Metodo::find($id);

        return view('metodo.show', compact('metodo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metodo = Metodo::find($id);

        return view('metodo.edit', compact('metodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Metodo $metodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Metodo $metodo)
    {
        request()->validate(Metodo::$rules);

        $metodo->update($request->all());

        return redirect()->route('metodos.index')
            ->with('success', 'Metodo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $metodo = Metodo::find($id)->delete();

        return redirect()->route('metodos.index')
            ->with('success', 'Metodo deleted successfully');
    }
}
