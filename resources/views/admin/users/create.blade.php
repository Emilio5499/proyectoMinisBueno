@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Crear usuario</h1>

    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Nombre</label>
            <input type="text" name="name" class="border w-full px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="border w-full px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Contraseña</label>
            <input type="password" name="password" class="border w-full px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Rol</label>
            <select name="role" class="border w-full px-3 py-2" required>
                <option value="admin_principal">Admin principal</option>
                <option value="admin_secundario">Admin secundario (pintor)</option>
            </select>
        </div>

        <button class="bg-green-600 text-white px-4 py-2 rounded">
            Crear usuario
        </button>
    </form>
@endsection
