<!-- resources/views/produto/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Produto</h1>
    <form action="{{ route('produto.update', $produto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="{{ $produto->nome }}">
        </div>
        <div>
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" value="{{ $produto->codigo }}">
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor" value="{{ $produto->valor }}">
        </div>
        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade" value="{{ $produto->quantidade }}">
        </div>
        <div>
    <label for="categoria_id">Categoria:</label>
    <select name="categoria_id" id="categoria_id">
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ $produto->categoria_id == $categoria->id ? 'selected' : '' }}>{{ $categoria->tipo }}</option>
        @endforeach
    </select>
</div>
        <button type="submit">Atualizar</button>
    </form>
</div>
@endsection
