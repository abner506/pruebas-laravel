<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\estudiante;

use Illuminate\Support\Facades\DB;


class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $texto=trim($request->get ('texto'));
        $estudiante=DB::table ('estudiante')->select('Matricula','Nombre','Direccion')
        ->where ('matricula','=',$texto)->paginate(10);
        return view ('estudiante.index', compact('estudiante','texto'));
    }

    public function destroy($id)
        {
        $estudiante= estudiantes::find($id);
        //dd($estudiante);
        $estudiante->delete();
        return redirect()->route('Lista.index');
        }

}
