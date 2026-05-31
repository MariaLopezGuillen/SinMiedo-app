<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Foro de apoyo contra el bullying</h2>
                <p class="text-sm text-gray-500">Comparte experiencias y busca apoyo de forma segura.</p>
            </div>

            <div>
                <a href="{{ route('forum.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Nueva publicación</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-6 rounded-lg bg-emerald-50 border border-emerald-200 p-4 text-emerald-700">
                    {{ session('success') }}
                </div>
            @endif

            <div class="space-y-6">
                @forelse($posts as $post)
                    <div class="rounded-lg bg-white shadow-sm border border-gray-200 overflow-hidden">
                        <div class="p-6">
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>Por {{ $post->user->name }}</span>
                                <span>{{ $post->created_at->diffForHumans() }}</span>
                            </div>

                            <a href="{{ route('forum.show', $post) }}" class="mt-3 block text-2xl font-semibold text-gray-900 hover:text-blue-600">{{ $post->title }}</a>

                            <p class="mt-3 text-gray-600">{{ Str::limit($post->body, 170) }}</p>

                            <div class="mt-4">
                                <a href="{{ route('forum.show', $post) }}" class="text-sm font-medium text-blue-600 hover:text-blue-800">Leer publicación →</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="rounded-lg bg-white shadow-sm border border-gray-200 p-6 text-gray-700">
                        No hay publicaciones aún. Sé el primero en compartir una experiencia o pedir ayuda.
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
