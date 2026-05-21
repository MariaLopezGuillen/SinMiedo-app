<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nueva publicación en el foro</h2>
                <p class="text-sm text-gray-500">Comparte tu experiencia o busca consejos en un espacio seguro.</p>
            </div>
            <div>
                <a href="{{ route('forum.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md text-sm font-medium text-gray-700 hover:bg-gray-200">Volver al foro</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded-lg bg-white shadow-sm border border-gray-200 p-6">
                <form method="POST" action="{{ route('forum.store') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                        <input id="title" name="title" type="text" value="{{ old('title') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" />
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-700">Mensaje</label>
                        <textarea id="body" name="body" rows="8" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Publicar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
