<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Diario Privado</title>
    <link rel="stylesheet" href="{{ asset('css/diary.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Diario') }}
        </h2>
    </x-slot>
<body>

    <div class="diary-container">
        <header class="diary-header">
            <div class="logo">
                <span class="logo-icon">📖</span>
                <h1>Mi Diario Privado</h1>
            </div>
            <nav class="diary-nav">
                <a href="{{ route('diary.index') }}" class="nav-link">Mis Entradas</a>
                <a href="{{ route('diary.create') }}" class="nav-link btn-primary">Nueva Entrada</a>
            </nav>
        </header>

        <main class="diary-main">
            @if(session('success'))
                <div class="alert alert-success" id="alertMessage">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-error" id="alertMessage">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="diary-footer">
            <p> Tu diario privado. Tus pensamientos, solo tuyos.</p>
        </footer>
    </div>

    <script src="{{ asset('js/diary.js') }}"></script>
</body>

</html>
</x-app-layout>
