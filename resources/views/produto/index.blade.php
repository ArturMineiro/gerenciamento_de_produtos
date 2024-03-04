<!-- resources/views/produto/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container  shadow-lg p-3 mb-5 bg-body rounded">
    <h1>Produtos</h1>
    <a href="{{ route('produto.create') }}" class="btn btn-primary mb-3">Adicionar Produto</a>
    <a href="{{route('categoria.index')  }}" class="btn btn-warning mb-3"> Ir para categorias</a>
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
            @foreach ($produto as $produto)
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
</div>
@endsection
