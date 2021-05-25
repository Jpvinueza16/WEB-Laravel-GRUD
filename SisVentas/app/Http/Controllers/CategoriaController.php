<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\DB;
use sisVentas\Http\Requests\CategoriaFormRequest;

class CategoriaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request)
        {
            /*$categoria=DB::table('categoria')
            ->where ('condicion','=','1')
            ->orderBy('idcategoria','desc')
            ->paginate(7);
            return view('categoria.index',["categoria"=>$categoria]);*/
            $query=trim($request->get('searchText'));
            $categoria = Categoria::all();
            return view('categoria.index',["categoria"=>$categoria,"searchText"=>$query]);
        }
    }


    public function create()
    {
        return view('categoria.create');
    }

    public function store(Request $request)
    {        
        $categoria=new Categoria;
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->condicion='1';
        $categoria->save();
        return redirect('/categoria');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view('categoria.edit')->with('categoria',$categoria);
    }

    public function update(Request $request, $id)
    {
        $categoria=Categoria::findOrFail($id);
        $categoria->nombre=$request->get('nombre');
        $categoria->descripcion=$request->get('descripcion');
        $categoria->update();
        return redirect('/categoria');
    }

    public function destroy($id)
    {
      /*  $categoria=Categoria::findOrFail($id);
        $categoria->condicion='0';
        $categoria->update();
        return redirect('/categoria');*/
        $categoria=Categoria::findOrFail($id);
        $categoria->delete();
        return redirect('/categoria');

    }
}
