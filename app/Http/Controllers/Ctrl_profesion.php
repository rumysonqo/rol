<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Model_profesion;


class Ctrl_profesion extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profesion=Model_profesion::orderBy('id','DESC')->get();
        return view('profesion.view_index_profesion')->with('profesion',$profesion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //dd('hola...');
        return view('profesion.view_crear_profesion');
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
        Model_profesion::create($request->all());
        Session::flash('message','El registro fue creado');
        return redirect()->route('profesion.index')->with('success','Registro creado satisfactoriamente');

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
        $profesion=Model_profesion::find($id);
        return view('profesion.view_edit_profesion',compact('profesion'));
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
        Model_profesion::find($id)->update($request->all());
        Session::flash('message', 'El registro fue actualizado');
        return redirect()->route('profesion.index')->with('success','Registro actualizado satisfactoriamente');
 
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
        $registro=Model_profesion::find($id);
        $registro->delete();
        Session::flash('message', 'La profesion: '.$registro->descripcion.', fue eliminada');
        return redirect()->route('profesion.index')->with('success','Registro eliminado satisfactoriamente');
   
    }
}
