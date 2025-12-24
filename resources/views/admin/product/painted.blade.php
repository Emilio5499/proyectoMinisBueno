@extends('layouts.admin')

@section('title', 'Pintado de producto')

@section('content')
    <h1 class="text-xl font-bold mb-4">
        Pintado: {{ $product->name }}
    </h1>

    <form method="POST" action="{{ route('admin.products.painted.update', $product) }}">
        @csrf
        @method('PUT')

        <label>
            Precio extra (€)
            <input
                type="number"
                step="0.01"
                name="extra_price"
                value="{{ $painted?->extra_price ?? 0 }}"
            >
        </label>

        <br><br>

        <label>
            <input
                type="checkbox"
                name="is_active"
                value="1"
                {{ ($painted?->is_active ?? false) ? 'checked' : '' }}
            >
            Pintado disponible
        </label>

        <br><br>

        <button type="submit">Guardar</button>
    </form>
@endsection
