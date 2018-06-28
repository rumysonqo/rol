<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Model_establecimiento;
use App\Model_profesion;
use App\Model_condicion;
use App\Model_personal;
use DB;


class Ctrl_personal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $personal=DB::table('personal')
        ->join('profesion','profesion.id','=','personal.id_profesion')
        ->join('condicion','condicion.id','=','personal.id_condicion')
        ->join('establecimiento','establecimiento.id','=','personal.id_establecimiento')
        ->select('personal.id','personal.dni','personal.nombre','personal.paterno','personal.materno','personal.colegiatura','profesion.descripcion as profesion','condicion.descripcion as condicion','establecimiento.descripcion as establecimiento')
        ->get();
        //dd($estab);
        return view('personal.view_index_personal')->with('personal',$personal);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $estab=Model_establecimiento::pluck('descripcion','id');
        $profe=Model_profesion::pluck('descripcion','id');
        $condicion=Model_condicion::pluck('descripcion','id');
        return view('personal.view_crear_personal')->with('estab',$estab)->with('profe',$profe)->with('condicion',$condicion);
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
        $this->validate($request, ['dni'=>'required']);
        $this->validate($request, ['nombre'=>'required']);
        $this->validate($request, ['paterno'=>'required']);
        $this->validate($request, ['materno'=>'required']);
        $this->validate($request, ['id_profesion'=>'required']);
        $this->validate($request, ['id_condicion'=>'required']);
        $this->validate($request, ['id_establecimiento'=>'required']);
        Model_personal::create($request->all());
        Session::flash('message','El registro fue creado');
        return redirect()->route('personal.index');

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

        
        $personal=Model_personal::find($id);
        $estab=Model_establecimiento::pluck('descripcion','id');
        $profe=Model_profesion::pluck('descripcion','id');
        $condicion=Model_condicion::pluck('descripcion','id');

        return view('personal.view_edit_personal')->with('personal',$personal)->with('estab',$estab)->with('profe',$profe)->with('condicion',$condicion);
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
        $this->validate($request,[ 'dni'=>'required']);
        $this->validate($request,[ 'nombre'=>'required']);
        $this->validate($request,[ 'paterno'=>'required']);
        $this->validate($request,[ 'materno'=>'required']);
        $this->validate($request,[ 'id_profesion'=>'required']);
        $this->validate($request,[ 'colegiatura'=>'required']);
        $this->validate($request,[ 'id_condicion'=>'required']);
        $this->validate($request,[ 'id_establecimiento'=>'required']);

        Model_personal::find($id)->update($request->all());
        Session::flash('message', 'El registro fue actualizado');
        return redirect()->route('personal.index');
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
        $registro=Model_personal::find($id);
        $registro->delete();
        Session::flash('message', 'El personal : '.$registro->nombre.' '.$registro->paterno.' '.$registro->materno.', fue eliminado');
        return redirect()->route('personal.index');
    }
}
