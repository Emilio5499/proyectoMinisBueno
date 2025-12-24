@extends('layouts.admin')

@section('title', 'Productos')

@section('content')

    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Productos</h1>

        <a href="{{ route('admin.products.create') }}" class="underline">
            + Nuevo producto
        </a>
    </div>

    <table class="w-full border-collapse border">
        <thead>
        <tr class="bg-gray-100">
            <th class="border p-2 text-left">Nombre</th>
            <th class="border p-2">Precio</th>
            <th class="border p-2">Stock</th>
            <th class="border p-2">Pintado</th>
            <th class="border p-2">Acciones</th>
        </tr>
        </thead>

        <tbody>
        @forelse($products as $product)
            <tr>
                <td class="border p-2">{{ $product->name }}</td>
                <td class="border p-2 text-center">{{ $product->price }} €</td>
                <td class="border p-2 text-center">{{ $product->stock }}</td>

                <td class="border p-2 text-center">
                    @if($product->hasPaintOption())
                        🎨 +{{ $product->paintExtraPrice() }} €
                    @else
                        —
                    @endif
                </td>

                <td class="border p-2 text-center space-x-2">
                    <a href="{{ route('admin.products.edit', $product) }}">
                        Editar
                    </a>

                    <a href="{{ route('admin.products.painted.edit', $product) }}">
                        Pintado
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">
                    No hay productos todavía
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

@endsection
