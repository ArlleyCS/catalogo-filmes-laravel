<x-layouts.app>

    <div class="p-4 sm:p-6">

        {{-- CABEÇALHO DA PÁGINA COM O FORMULÁRIO DE BUSCA --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <h1 class="text-2xl font-semibold text-white">Catálogo de Filmes</h1>
            
            {{-- FORMULÁRIO DE BUSCA --}}
            <form action="{{ route('filmes.index') }}" method="GET" class="flex items-center w-full sm:w-auto">
                <input type="text" name="search" placeholder="Buscar por título..." 
                       value="{{ request('search') }}"
                       class="px-4 py-2 w-full sm:w-64 bg-gray-700 border-gray-600 text-white rounded-l-lg focus:ring-blue-500 focus:border-blue-500">
                <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-600 rounded-r-lg hover:bg-blue-700">
                    Buscar
                </button>
            </form>
            
            <a href="{{ route('filmes.create') }}" class="px-4 py-2 font-bold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors duration-200 w-full sm:w-auto text-center">
                Adicionar Filme
            </a>
        </div>

        {{-- GRID DE FILMES --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-6">

            @forelse ($filmes as $filme)
                {{-- O card do filme continua o mesmo --}}
                <div class="bg-gray-800 rounded-lg shadow-lg overflow-hidden flex flex-col">
                    <a href="{{ route('filmes.show', $filme) }}">
                        <img class="w-full h-auto object-cover" 
                             src="{{ $filme->cover_url ?: 'https://via.placeholder.com/500x750.png?text=Sem+Imagem' }}" 
                             alt="Pôster de {{ $filme->titulo }}">
                    </a>
                    <div class="p-4 flex flex-col flex-grow justify-between">
                        <div>
                            <h3 class="text-lg font-bold text-white truncate">{{ $filme->titulo }}</h3>
                            <p class="text-sm text-gray-400">{{ $filme->ano_lancamento }}</p>
                        </div>
                        <div class="mt-4 flex justify-end items-center space-x-3">
                            <a href="{{ route('filmes.edit', $filme) }}" class="text-sm font-semibold text-yellow-400 hover:text-yellow-300">Editar</a>
                            <form action="{{ route('filmes.destroy', $filme) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm font-semibold text-red-500 hover:text-red-400" onclick="return confirm('Tem certeza que deseja apagar este filme?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500 py-20">
                    @if (request('search'))
                        <p>Nenhum filme encontrado para a busca: <strong>"{{ request('search') }}"</strong></p>
                    @else
                        <p>Nenhum filme cadastrado ainda.</p>
                    @endif
                </div>
            @endforelse
        </div>

        {{-- LINKS DE PAGINAÇÃO --}}
        <div class="mt-8 text-white">
            {{ $filmes->appends(request()->query())->links() }}
        </div>
    </div>

</x-layouts.app>