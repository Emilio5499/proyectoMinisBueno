<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Panel Admin')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-white">
        <div class="p-4 font-bold text-lg">
            Tienda 3D
        </div>

        <nav class="px-4 space-y-2">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>

            @if(auth()->user()->isAdminPrincipal())
                <a href="#">Productos</a>
                <a href="#">Pedidos</a>
                <a href="#">Usuarios</a>
            @endif

            @if(auth()->user()->isAdminSecundario())
                <a href="#">Pedidos a pintar</a>
            @endif
        </nav>
    </aside>

    @if(auth()->user()->isAdminPrincipal())
        <a href="{{ route('admin.products.index') }}">Productos</a>
    @endif

    <!-- Main content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</div>

</body>
</html>
