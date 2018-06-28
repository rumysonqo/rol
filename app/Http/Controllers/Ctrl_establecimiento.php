<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Model_establecimiento;
use App\Model_micro_red;
use DB;

class Ctrl_establecimiento extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $estab=DB::table('establecimiento')
        ->join('micro_red','micro_red.id','=','establecimiento.id_micro_red')
        ->select('establecimiento.id','establecimiento.descripcion','establecimiento.ugipress','establecimiento.ipress','establecimiento.tipo','establecimiento.categoria','micro_red.descripcion as micro_red')
        ->get();
        //dd($estab);
        return view('establecimiento.view_index_establecimiento')->with('estab',$estab);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $micro=Model_micro_red::pluck('descripcion','id');
        return view('establecimiento.view_crear_establecimiento')->with('micro',$micro);
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
        //dd($request->all());
        $this->validate($request, ['descripcion'=>'required']);
        $this->validate($request, ['id_micro_red'=>'required']);
        $this->validate($request, ['ugipress'=>'required']);
        $this->validate($request, ['ipress'=>'required']);
        $this->validate($request, ['tipo'=>'required|in:Puesto de Salud,Centro de Salud']);

        Model_establecimiento::create($request->all());
        Session::flash('message','El registro fue creado');
        return redirect()->route('establecimiento.index');
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
        $estab=Model_establecimiento::find($id);
        $micro=Model_micro_red::pluck('descripcion','id');
        return view('establecimiento.view_edit_establecimiento')->with('estab',$estab)->with('micro',$micro);
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
        $this->validate($request,[ 'descripcion'=>'required']);
        $this->validate($request,[ 'id_micro_red'=>'required']);
        $this->validate($request,[ 'ugipress'=>'required']);
        $this->validate($request,[ 'ipress'=>'required']);
        $this->validate($request,[ 'tipo'=>'required']);
        $this->validate($request,[ 'categoria'=>'required']);
        Model_establecimiento::find($id)->update($request->all());
        Session::flash('message', 'El registro fue actualizado');
        return redirect()->route('establecimiento.index');
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
        $registro=Model_establecimiento::find($id);
        $registro->delete();
        Session::flash('message', 'El establecimiento : '.$registro->descripcion.', fue eliminado');
        return redirect()->route('establecimiento.index');
    }
}
