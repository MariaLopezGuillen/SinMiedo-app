<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900">Foro seguro de apoyo</h3>
                    <p class="mt-2 text-gray-600">Comparte tu situación, busca consejos y recibe ayuda de otros usuarios en un espacio confiable.</p>
                    <div class="mt-4">
                        <a href="{{ route('forum.index') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700">Ir al foro</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
