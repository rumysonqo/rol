<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Model_condicion;

class Ctrl_condicion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $condicion=Model_condicion::orderBy('id','DESC')->get();
        return view('condicion.view_index_condicion')->with('condicion',$condicion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('condicion.view_crear_condicion');
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
        Model_condicion::create($request->all());
        Session::flash('message','El registro fue creado');
        return redirect()->route('condicion.index')->with('success','Registro creado satisfactoriamente');
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
         $condicion=Model_condicion::find($id);
        return view('condicion.view_edit_condicion',compact('condicion'));
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
        Model_condicion::find($id)->update($request->all());
        Session::flash('message', 'El registro fue actualizado');
        return redirect()->route('condicion.index');
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
         $registro=Model_condicion::find($id);
        $registro->delete();
        Session::flash('message', 'La condicion: '.$registro->descripcion.', fue eliminada');
        return redirect()->route('condicion.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
