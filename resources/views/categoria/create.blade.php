<!-- resources/views/categoria/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container w-50  shadow-lg p-3 mb-5 bg-body rounded">
        <h2>Criar Categoria</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" class="form-control" id="tipo" name="tipo">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Salvar</button>
        </form>
    </div>
@endsection
