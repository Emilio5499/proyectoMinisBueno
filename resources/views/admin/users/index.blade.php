@extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Usuarios</h1>

    <a href="{{ route('admin.users.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
        Nuevo usuario
    </a>

    <table class="w-full border">
        <thead>
        <tr class="bg-gray-100">
            <th class="border px-3 py-2">Nombre</th>
            <th class="border px-3 py-2">Email</th>
            <th class="border px-3 py-2">Rol</th>
            <th class="border px-3 py-2">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td class="border px-3 py-2">{{ $user->name }}</td>
                <td class="border px-3 py-2">{{ $user->email }}</td>
                <td class="border px-3 py-2">
                    {{ $user->role }}
                </td>
                <td class="border px-3 py-2">
                    <a href="{{ route('admin.users.edit', $user) }}"
                       class="text-blue-600">
                        Editar
                    </a>
                </td>
            </tr>

            <form
                action="{{ route('admin.users.destroy', $user) }}"
                method="POST"
                class="inline"
                onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?')"
            >
                @csrf
                @method('DELETE')

                <button class="text-red-600 ml-2">
                    Eliminar
                </button>
            </form>
        @endforeach
        </tbody>
    </table>
@endsection
