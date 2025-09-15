<x-layouts.app>

    <div class="p-4 sm:p-6">
        {{-- Título e Boas-Vindas --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-100">{{ __('Dashboard')}}</h1>
            <p class="text-gray-400 mt-1">{{ __('Welcome to the dashboard') }}</p>
        </div>

        {{-- ====================================================== --}}
        {{-- |          COLE O CÓDIGO DO BOTÃO AQUI               | --}}
        {{-- ====================================================== --}}
        <div class="mt-8 mb-8">
            <a href="{{ route('filmes.index') }}" 
               class="inline-flex items-center px-6 py-3 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700 transition-colors duration-200 shadow-lg">
                <i class="fas fa-film mr-3"></i>
                Acessar Catálogo de Filmes
            </a>
        </div>

</x-layouts.app>