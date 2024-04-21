<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function pesquisar(Request $request)
{
    $termo = $request->input('termo');

    if ($termo) {
        $categorias = Categoria::where('tipo', 'LIKE', "%$termo%")->get();
    } else {
        $categorias = Categoria::all();
    }

    return view('categoria.index', compact('categorias'));
}

    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }
    
     public function create()
    {
        return view('categoria.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categoria.index')
            ->with('success', 'Categoria criada com sucesso.');
    }

    
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categoria.index')
            ->with('success', 'Categoria atualizada com sucesso.');
    }

  
    public function delete($id)
    { 
         $categoria = Categoria::findOrFail($id);
        $categoria->delete();
    
        return redirect()->route('categoria.index');;
    }
}
