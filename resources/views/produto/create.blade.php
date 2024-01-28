<!-- resources/views/produto/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Adicionar Produto</h1>
    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
        <div>
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome">
        </div>
        <div>
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo">
        </div>
        <div>
            <label for="valor">Valor:</label>
            <input type="text" id="valor" name="valor">
        </div>
        <div>
            <label for="quantidade">Quantidade:</label>
            <input type="number" id="quantidade" name="quantidade">
        </div>
        <button type="submit">Salvar</button>
    </form>
</div>
@endsection
