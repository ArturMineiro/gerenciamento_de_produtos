<!-- produto.create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container w-50 shadow-lg p-3 mb-5 bg-body rounded">
    <h1>Adicionar Produto</h1>
    <form action="{{ route('produto.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome">
        </div>
        <div class="form-group">
            <label for="codigo">Código:</label>
            <input type="text" class="form-control" id="codigo" name="codigo">
        </div>
        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" class="form-control" id="valor" name="valor">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade:</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade">
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria:</label>
            <select class="form-control" name="categoria_id" id="categoria_id">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->tipo }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Salvar</button>
    </form>
</div>
@endsection
