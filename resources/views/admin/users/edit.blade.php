@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Editar usuario</h1>

    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Nombre</label>
            <input
                type="text"
                name="name"
                class="border w-full px-3 py-2"
                value="{{ old('name', $user->name) }}"
                required
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input
                type="email"
                name="email"
                class="border w-full px-3 py-2"
                value="{{ old('email', $user->email) }}"
                required
            >
        </div>

        <div class="mb-4">
            <label class="block mb-1">Rol</label>
            <select name="role" class="border w-full px-3 py-2" required>
                <option value="admin_principal"
                    @selected($user->role === 'admin_principal')>
                    Admin principal
                </option>
                <option value="admin_secundario"
                    @selected($user->role === 'admin_secundario')>
                    Admin secundario (pintor)
                </option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">
                Nueva contraseña (dejar vacío para no cambiar)
            </label>
            <input
                type="password"
                name="password"
                class="border w-full px-3 py-2"
            >
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Guardar cambios
        </button>
    </form>
@endsection
