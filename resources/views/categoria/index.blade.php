<!-- resources/views/categoria/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container  shadow-lg p-3 mb-5 bg-body rounded">
        <h2>Categorias</h2>
    
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('categoria.create') }}" class="btn btn-success">Criar Nova Categoria</a>
        <form action="{{ route('categoria.pesquisar') }}" method="GET" class="mt-3 w-50">
        <div class="input-group mb-3">
            <input type="text" name="termo" class="form-control" placeholder="Pesquisar por tipo de categoria" aria-label="Pesquisar" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
        </div>
    </form>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->tipo }}</td>
                        <td>
                            <a href="{{ route('categoria.edit', $categoria->id) }}" class="btn btn-primary mb-2">Editar</a>
                            <form action="{{ route('categoria.delete', $categoria->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('produto.index') }}" class="btn btn-primary">Voltar</a>
    </div>

@endsection
