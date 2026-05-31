<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
        <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
    </x-slot>

    <div class="forum-wrapper">

        <a href="{{ route('forum.index') }}" class="btn-back">← Volver al foro</a>

        <div class="post-full">

            <div class="post-full-header">
                <div class="post-avatar large">
                    {{ strtoupper(substr($post->user->anonymous_name, 0, 2)) }}
                </div>
                <div>
                    <span class="post-author">{{ $post->user->anonymous_name }}</span>
                    <span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
                </div>
            </div>

            <h1 class="post-full-title">{{ $post->title }}</h1>

            <div class="post-full-body">
                {{ $post->body }}
            </div>

        </div>

    </div>

</x-app-layout>