<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nueva publicación') }}
        </h2>
        <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
    </x-slot>

    <div class="forum-wrapper">

        <div class="form-header">
            <a href="{{ route('forum.index') }}" class="btn-back">← Volver al foro</a>
            <h1 class="forum-title">Nueva publicación</h1>
            <p class="forum-subtitle">Escribe de forma anónima y segura</p>
        </div>

        <div class="form-card">

            <div class="anonymous-notice">
                🔒 Tu publicación aparecerá como
                <strong>{{ Auth::user()->anonymous_name }}</strong>
            </div>

            <form method="POST" action="{{ route('forum.store') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Título</label>
                    <input
                        type="text"
                        name="title"
                        class="form-input {{ $errors->has('title') ? 'input-error' : '' }}"
                        placeholder="¿De qué quieres hablar?"
                        value="{{ old('title') }}"
                    >
                    @error('title')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">Contenido</label>
                    <textarea
                        name="body"
                        class="form-textarea {{ $errors->has('body') ? 'input-error' : '' }}"
                        placeholder="Cuéntanos lo que sientes..."
                        rows="8"
                    >{{ old('body') }}</textarea>
                    @error('body')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('forum.index') }}" class="btn-outline">Cancelar</a>
                    <button type="submit" class="btn-primary">Publicar →</button>
                </div>

            </form>

        </div>

    </div>

</x-app-layout>