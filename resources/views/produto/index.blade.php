<!-- resources/views/produto/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>produto</h1>
    <a href="{{ route('produto.create') }}">Adicionar Produto</a>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Código</th>
                <th>Valor</th>
                <th>Quantidade</th>
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
                    <td>
                        <a href="{{ route('produto.edit', $produto->id) }}">Editar</a>
                        <form action="{{ route('produto.delete', $produto->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
