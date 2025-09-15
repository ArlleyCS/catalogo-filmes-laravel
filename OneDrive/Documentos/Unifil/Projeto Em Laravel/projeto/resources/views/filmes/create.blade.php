<x-layouts.app>
    <div class="p-4 sm:p-6 bg-gray-800 rounded-lg shadow-md text-white">
        <h1 class="text-2xl font-semibold mb-6">Adicionar Novo Filme</h1>

        <form action="{{ route('filmes.store') }}" method="POST">
            @include('filmes._form')
        </form>
    </div>
</x-layouts.app>