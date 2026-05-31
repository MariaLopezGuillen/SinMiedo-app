<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Foro') }}
        </h2>
        <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
    </x-slot>

    <div class="forum-wrapper">

        <div class="forum-header">
            <div>
                <h1 class="forum-title">Foro juvenil 💬</h1>
                <p class="forum-subtitle">Un espacio seguro para hablar y compartir</p>
            </div>
            <a href="{{ route('forum.create') }}" class="btn-primary">+ Nueva publicación</a>
        </div>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="posts-list">
            @forelse($posts as $post)
                <a href="{{ route('forum.show', $post) }}" class="post-card">
                    <div class="post-avatar">
                        {{ strtoupper(substr($post->user->anonymous_name, 0, 2)) }}
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <p class="post-excerpt">{{ Str::limit($post->body, 120) }}</p>
                        <div class="post-meta">
                            <span class="post-author">{{ $post->user->anonymous_name }}</span>
                            <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="empty-state">
                    <p>Aún no hay publicaciones. ¡Sé el primero en escribir!</p>
                    <a href="{{ route('forum.create') }}" class="btn-primary">Crear publicación</a>
                </div>
            @endforelse
        </div>

        <div class="pagination-wrapper">
            {{ $posts->links() }}
        </div>

    </div>
    <x-footer />
</x-app-layout>