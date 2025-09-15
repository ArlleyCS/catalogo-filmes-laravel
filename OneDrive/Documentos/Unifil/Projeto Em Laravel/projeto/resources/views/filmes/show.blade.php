<x-layouts.app>
    <div class="p-4 sm:p-6 bg-gray-800 rounded-lg shadow-md text-white">
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1">
                 <img class="w-full h-auto object-cover rounded-lg" 
                     src="{{ $filme->cover_url ?: 'https://via.placeholder.com/500x750.png?text=Sem+Imagem' }}" 
                     alt="Pôster de {{ $filme->titulo }}">
            </div>
            <div class="md:col-span-2">
                <h1 class="text-3xl font-bold mb-2">{{ $filme->titulo }}</h1>
                <p class="text-gray-400 mb-4">Ano de Lançamento: {{ $filme->ano_lancamento }}</p>

                <div class="mb-4">
                    <strong class="block font-bold mb-1 text-gray-300">Sinopse:</strong>
                    <p class="text-gray-400 whitespace-pre-wrap">{{ $filme->sinopse }}</p>
                </div>

                @if($filme->data_assistido)
                    <p class="text-gray-400 mb-4">
                        <strong>Assistido em:</strong> {{ \Carbon\Carbon::parse($filme->data_assistido)->format('d/m/Y') }}
                    </p>
                @endif
                
                <div class="mt-6">
                    <a href="{{ route('filmes.index') }}" class="text-blue-500 hover:text-blue-400">
                        &larr; Voltar para o Catálogo
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>