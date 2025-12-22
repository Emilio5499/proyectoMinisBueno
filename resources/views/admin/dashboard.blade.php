@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">
        Bienvenido, {{ auth()->user()->name }}
    </h1>

    <p>Panel de administración principal.</p>
@endsection
