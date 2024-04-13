<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    // Em App\Http\Controllers\ProdutoController.php

    public function index()
    {
        $produtos = Produto::all();
        
        // Calcular total de quantidade e valor
        $total_quantidade = $produtos->sum('quantidade');
        $total_valor = $produtos->sum(function ($produto) {
            return $produto->valor * $produto->quantidade;
        });
    
        return view('produto.index', compact('produtos', 'total_quantidade', 'total_valor'));
    }

    public function create()
    {
        $categorias = Categoria::all(); // Busca todas as categorias
        return view('produto.create', compact('categorias'));
    }

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'nome' => 'required|max:255',
            'codigo' => 'required',
            'valor' => 'required',
            'quantidade' => 'required',
            'categoria_id' => 'required' // Certifique-se de que o campo categoria_id seja obrigatório
        ]);

        // Altere 'categoria_id' para o nome do campo que está sendo enviado pelo formulário
        $validatedData['categoria_id'] = $request->categoria_id;

        Produto::create($validatedData);

        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso.');
    } catch (\Exception $e) {
        dd($e->getMessage()); // Exibe a mensagem de erro
    }
}

    
    public function edit($id)
{
    $produto = Produto::findOrFail($id);
    $categorias = Categoria::all(); // Busca todas as categorias
    return view('produto.edit', compact('produto', 'categorias'));
}

public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'nome' => 'required|max:255',
        'codigo' => 'required',
        'valor' => 'required',
        'quantidade' => 'required'
    ]);

    Produto::whereId($id)->update([
        'nome' => $request->nome,
        'codigo' => $request->codigo,
        'valor' => $request->valor,
        'quantidade' => $request->quantidade,
        'categoria_id' => $request->categoria_id
    ]);

    return redirect()->route('produto.index');
}
public function delete($id)
{
    $produto = Produto::findOrFail($id);
    $produto->delete();

    return redirect()->route('produto.index');
}
public function pesquisar(Request $request)
{
    // Obter o termo de pesquisa da solicitação
    $termo = $request->input('termo');

    // Verificar se há um termo de pesquisa
    if ($termo) {
        // Se houver um termo de pesquisa, executar a consulta de pesquisa
        $produtos = Produto::where('nome', 'LIKE', "%$termo%")->get();
    } else {
        // Se não houver termo de pesquisa, retornar todos os produtos
        $produtos = Produto::all();
    }

    // Calcular total de quantidade e valor para os produtos encontrados
    $total_quantidade = $produtos->sum('quantidade');
    $total_valor = $produtos->sum(function ($produto) {
        return $produto->valor * $produto->quantidade;
    });

    // Retornar a view com os resultados da pesquisa
    return view('produto.index', [
        'produtos' => $produtos,
        'total_quantidade' => $total_quantidade,
        'total_valor' => $total_valor
    ]);
}


}