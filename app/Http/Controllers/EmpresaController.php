<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;

/**
 * Class EmpresaController
 * @package App\Http\Controllers
 */
class EmpresaController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate();

        return view('empresa.index', compact('empresas'))
            ->with('i', (request()->input('page', 1) - 1) * $empresas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $empresa = new Empresa();
        return view('empresa.create', compact('empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa();

        $empresa->codigo = $request->get('codigo');
        $empresa->nombre = $request->get('nombre');
        $empresa->descripcion_empresa = $request->get('descripcion');
        $empresa->capital_base = $request->get('capital_base');
        $empresa->capital_actual = $request->get('capital_actual_');
        $empresa->save();

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa creada exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::find($id);

        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Empresa $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        $empresa->codigo = $request->get('codigo');
        $empresa->nombre = $request->get('nombre');
        $empresa->descripcion_empresa = $request->get('descripcion');
        #$capital_base = $request->get('capital_base');
        
        #$capital_actual_edit = $empresa->capital_actual;
        #$capitalAgregado = $capital_base + $capital_actual_edit;
        #$empresa->capital_actual = $capitalAgregado;

        $empresa->capital_actual = $request->get('capital_actual_');

         
        $empresa->save();

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa actualizada exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id)->delete();

        return redirect()->route('empresas.index')
            ->with('success', 'Empresa deleted successfully');
    }



    /* public function search(Request $request)
    {
        $results = Post::where('title', 'LIKE', "%{$request->search}%")->get();
        return view('posts.results', compact('results'))->
        with(['search' => $request->search])->render();
    } */

    
}