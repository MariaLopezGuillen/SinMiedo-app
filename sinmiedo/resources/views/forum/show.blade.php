<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $post->title }}</h2>
                <p class="text-sm text-gray-500">Publicada por {{ $post->user->name }} · {{ $post->created_at->format('d M Y') }}</p>
            </div>
            <div>
                <a href="{{ route('forum.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">Volver al foro</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-lg bg-white shadow-sm border border-gray-200 p-6">
                <div class="prose prose-lg text-gray-700">
                    <p>{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
