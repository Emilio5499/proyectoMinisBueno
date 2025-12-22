@extends('layouts.admin')

@section('title', 'Productos')

@section('content')
    <h1 class="text-xl font-bold mb-4">Productos</h1>

    <a href="{{ route('admin.products.create') }}" class="underline">+ Nuevo producto</a>

    <table class="mt-4 w-full border">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th></th>
        </tr>

        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} €</td>
                <td>{{ $product->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product) }}">Editar</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
