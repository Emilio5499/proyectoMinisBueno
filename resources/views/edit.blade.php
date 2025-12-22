@extends('layouts.admin')

@section('title', 'Editar producto')

@section('content')
    <h1 class="text-xl font-bold mb-4">Editar producto</h1>

    <form method="POST" action="{{ route('admin.products.update', $product) }}">
        @csrf
        @method('PUT')

        <input name="name" value="{{ $product->name }}"><br>
        <textarea name="description">{{ $product->description }}</textarea><br>
        <input name="price" type="number" step="0.01" value="{{ $product->price }}"><br>
        <input name="stock" type="number" value="{{ $product->stock }}"><br>

        <button type="submit">Actualizar</button>
    </form>
@endsection
