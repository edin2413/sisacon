<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ControlAsiento;
use App\Models\DetalleAsiento;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ControlAsientoController
 * @package App\Http\Controllers
 */
class ControlAsientoController extends Controller
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
        $controlAsientos = 
        DB::select('select * from asientos_empresas_categorias');
        

        /* $controlAsientos = ControlAsiento::join('categorias as a', 'a.id', '=', 'control_asientos.categoria_id')
                                        ->join('empresas as c', 'c.id', '=', 'control_asientos.empresa_id')
                                        ->get(); */

        return view('control-asiento.index', compact('controlAsientos'))
            ->with('i');
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $controlAsiento = new ControlAsiento();
        $categorias =  Categoria::all();
        $empresas =  Empresa::all();
        
        return view('control-asiento.create', compact('controlAsiento'))
        ->with('categorias', $categorias)
        ->with('empresas', $empresas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function create_detalle()
    {
        $detalleAsiento = new DetalleAsiento();
        $categorias =  Categoria::all();
        $empresas =  Empresa::all();
        
        return view('control-asiento.create_detalle', compact('detalleAsiento'))
        ->with('categorias', $categorias)
        ->with('empresas', $empresas);
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
        
            $controlAsiento = new ControlAsiento();
            $controlAsiento->empresa_id = $request->get('empresa_id');
            $controlAsiento->categoria_id = $request->get('categoria_id');
            
            
            $controlAsiento->total = $request->get('total_');
            $controlAsiento->save();

            $controlasiento_id = $controlAsiento->id;
            $descripcion_detalle = $request->get('descripcion_');
            $cantidad_ = $request->get('cantidad_');
            $precio_ = $request->get('precio_');
            $numero_fila = $request->get('numero_fila_');
            //$subtotal_ = $request->get('total_');
            $cont = 0;

            while ($cont < $numero_fila) {
                $detalleAsiento = new DetalleAsiento();
                $detalleAsiento->controlasiento_id = $controlasiento_id;
                $detalleAsiento->descripcion_detalle = $descripcion_detalle[$cont];
                $detalleAsiento->cantidad = $cantidad_[$cont];
                $detalleAsiento->precio = $precio_[$cont];
                $detalleAsiento->total = $cantidad_[$cont] * $precio_[$cont];
                
                $detalleAsiento->save();
                $cont=$cont+1;
            }

            $empresa = Empresa::find($request->get('empresa_id'));
            $categoria = Categoria::find($request->get('categoria_id'));

            if ($categoria->descripcion_categoria === 'Ingresos') {
                
                if($empresa->capital_actual >= $empresa->capital_base){
                    $empresa->capital_actual = $empresa->capital_actual + $request->get('total_');
                    $empresa->save();
                    //echo 'suma';
                }
                else if ($empresa->capital_actual < $empresa->capital_base) {
                    #echo 'capital_actual: '. $empresa->capital_actual.'</br>' ;
                    #echo 'total: '.$request->get('total_').'</br>';
                    $valor =  $empresa->capital_actual + $request->get('total_') ;
                    $empresa->capital_actual = $valor;
                    $empresa->save();
                    #echo 'suma menor';
                }
            }
            else{
                $empresa->capital_actual = $empresa->capital_actual - $request->get('total_');
                $empresa->save();
                #echo 'resta';
            }

            DB::commit();
        }catch(\Exception $e)
        {
            DB::rollBack();
        }
     
        return redirect()->route('controlasientos.index')
            ->with('success', 'Control Asiento agregado  exitosamente.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $controlAsiento = 
        DB::select('select * from control_asientos_detalles where controlasiento_id='.$id.'');
        return view('control-asiento.show', compact('controlAsiento'))
        ->with('i');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #$controlAsiento = 
        #DB::select('select * from asientos_empresas_categorias where id='.$id.'');
        //return view('control-asiento.edit', compact('controlAsiento'));

        $controlAsiento = ControlAsiento::find($id);
        $empresa_id=$controlAsiento->empresa_id;
        $categoria_id=$controlAsiento->categoria_id;
        $empresas =  Empresa::where('id',$empresa_id)->get();
        $categorias =  Categoria::where('id',$categoria_id)->get();
        return view('control-asiento.edit', compact('controlAsiento'))
        ->with('categorias', $categorias)
        ->with('empresas', $empresas); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ControlAsiento $controlAsiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $controlAsiento = ControlAsiento::find($id);
        
        $controlAsiento->empresa_id = $request->get('empresa_id');
        $controlAsiento->categoria_id = $request->get('categoria_id');
        $controlAsiento->descripcion = $request->get('descripcion');
        $controlAsiento->cantidad = $request->get('cantidad');
        $controlAsiento->precio = $request->get('precio');
        $controlAsiento->total = $request->get('total_');
        $controlAsiento->save();

        $empresa = Empresa::find($request->get('empresa_id'));
        $categoria = Categoria::find($request->get('categoria_id'));

        if ($categoria->descripcion_categoria === 'Ingresos') {
            $empresa->capital_actual = $empresa->capital_actual + $request->get('total_');
            $empresa->save();
            #echo 'suma';
        }
        else{
            $empresa->capital_actual = $empresa->capital_actual - $request->get('total_');
            $empresa->save();
            #echo 'resta';
        }

        return redirect()->route('controlasientos.index')
            ->with('success', 'Control Asiento Actualizado Exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $controlAsiento = ControlAsiento::find($id)->delete();

        return redirect()->route('controlasientos.index')
            ->with('success', 'ControlAsiento deleted successfully');
    }
}
