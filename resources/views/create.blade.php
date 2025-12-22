@extends('layouts.admin')

@section('title', 'Nuevo producto')

@section('content')
    <h1 class="text-xl font-bold mb-4">Crear producto</h1>

    <form method="POST" action="{{ route('admin.products.store') }}">
        @csrf

        <input name="name" placeholder="Nombre"><br>
        <textarea name="description" placeholder="Descripción"></textarea><br>
        <input name="price" type="number" step="0.01" placeholder="Precio"><br>
        <input name="stock" type="number" placeholder="Stock"><br>

        <button type="submit">Guardar</button>
    </form>
@endsection
