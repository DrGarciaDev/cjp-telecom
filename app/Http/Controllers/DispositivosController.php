<?php

namespace CJPTELECOM\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class DispositivosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dispositivos.crear-dispositivos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        print_r('<pre>');
        $request->merge(["usuario_id"=>$request->session()->get('users')->id]);
        print_r($request->all());
        exit;
        // if($request->ajax()){
            $hora = new Carbon($request->input('fecha')." ".$request->input('hora'));
            $request->merge(["fecha"=>$hora->format('Y-m-d H:i:s')]);
            $registro = BD::crear('Abono', $request, 'Creó un nuevo abono.');
            $registro_id = NULL;
            $partes = explode("|",$registro);
            if($partes[0]==1){
                $registro_id = $partes[1];
            }
            ProductosExistencias::afectarStockDetalles($request->input('venta_id'));
            //enviamos un push para actualizar las secciones dinamicamente
            Comun::push("Actualizando información","real-time","desk","Abono");
            return $this->verificarSiVentaSaldada($request->input('venta_id'),$registro_id);
        // }
        // return "-1|Petición incorrecta";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
