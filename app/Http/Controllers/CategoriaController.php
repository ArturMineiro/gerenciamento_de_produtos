<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response; 
use App\Models\Categoria;

class CategoriaController extends Controller
{
    
    public function index()
    {
        $categoria = Categoria::all();
        return view('categoria.index', compact('categoria'));
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

        return redirect()->route('categorias.index')
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

  
    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();

        return redirect()->route('categorias.index')
            ->with('success', 'Categoria excluída com sucesso.');
    }
}