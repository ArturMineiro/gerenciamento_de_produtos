<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;


class ProdutoController extends Controller
{
    // Em App\Http\Controllers\ProdutoController.php

    public function index()
    {
        $produto = Produto::all();
        return view('produto.index', compact('produto'));
    }

    public function create()
    {
        return view('produto.create');
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'codigo' => 'required',
            'valor' => 'required',
            'quantidade' => 'required'
        ]);
    
        Produto::create($validatedData);
    
        return redirect()->route('produto.index');
    }
    
    public function edit($id)
{
    $produto = Produto::findOrFail($id);
    return view('produto.edit', compact('produto'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nome' => 'required|max:255',
        'codigo' => 'required',
        'valor' => 'required',
        'quantidade' => 'required'
    ]);

    Produto::whereId($id)->update($validatedData);

    return redirect()->route('produto.index');
}

public function delete($id)
{
    $produto = Produto::findOrFail($id);
    $produto->delete();

    return redirect()->route('produto.index');
}

}