<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Model_micro_red;


class Ctrl_micro_red extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $micro_red=Model_micro_red::orderBy('id','DESC')->get();
        return view('micro_red.view_index_micro_red')->with('micro_red',$micro_red);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('micro_red.view_crear_micro_red');
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
        $this->validate($request, ['descripcion'=>'required']);
        Model_micro_red::create($request->all());
        Session::flash('message','El registro fue creado');
        return redirect()->route('micro_red.index')->with('success','Registro creado satisfactoriamente');
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
        $micro_red=Model_micro_red::find($id);
        return view('micro_red.view_edit_micro_red',compact('micro_red'));
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
        Model_micro_red::find($id)->update($request->all());
        Session::flash('message', 'El registro fue actualizado');
        return redirect()->route('micro_red.index')->with('success','Registro actualizado satisfactoriamente');
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
        $registro=Model_micro_red::find($id);
        $registro->delete();
        Session::flash('message', 'La Micro Red : '.$registro->descripcion.', fue eliminada');
        return redirect()->route('micro_red.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
