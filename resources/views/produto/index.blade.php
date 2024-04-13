<!-- resources/views/produto/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container shadow-lg p-3 mb-5 bg-body rounded">
    <h1>Produtos</h1>

    <form action="{{ route('produto.pesquisar') }}" method="GET" class="mb-3 w-50">
        <div class="input-group">
            <input type="text" name="termo" class="form-control" placeholder="Pesquisar produtos...">
            <button type="submit" class="btn btn-outline-secondary">Pesquisar</button>
        </div>
    </form>
    <a href="{{ route('produto.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
    <a href="{{ route('categoria.index') }}" class="btn btn-warning mb-3">Ir para categorias</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Código</th>
                <th>Valor</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->codigo }}</td>
                    <td>{{ $produto->valor }}</td>
                    <td>{{ $produto->quantidade }}</td>
                    <td>{{ $produto->categoria_id ? $produto->categoria->tipo : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-sm btn-primary mr-1">Editar</a>
                        <form action="{{ route('produto.delete', $produto->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        <h4>Total de Produtos Vendidos</h4>
        <p><strong>Quantidade total produtos:</strong> {{ $total_quantidade }}</p>
        <p><strong>Valor Total:</strong> R$ {{ $total_valor }}</p>
    </div>
</div>
@endsection
