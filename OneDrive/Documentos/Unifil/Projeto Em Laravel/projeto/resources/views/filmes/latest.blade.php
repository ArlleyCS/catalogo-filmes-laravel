<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Últimos Filmes Adicionados</title>
    {{-- Importa o CSS do seu projeto para estilização --}}
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-100">

    <div class="container mx-auto px-4 py-8">
        
        <h1 class="text-4xl font-bold text-gray-800 text-center mb-8">Últimos Filmes Adicionados</h1>

        {{-- Grid para os filmes --}}
        @if($filmes->count() > 0)
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
                
                {{-- Loop para exibir cada filme --}}
                @foreach ($filmes as $filme)
                    <div>
                        <img src="{{ $filme->cover_url ?: 'https://via.placeholder.com/500x750.png?text=Sem+Imagem' }}" 
                             alt="Pôster de {{ $filme->titulo }}"
                             class="rounded-lg shadow-lg w-full h-auto object-cover transition-transform duration-300 hover:scale-105">
                        
                        <h2 class="mt-2 text-lg font-semibold text-gray-700 truncate">{{ $filme->titulo }}</h2>
                    </div>
                @endforeach

            </div>
        @else
            <div class="text-center text-gray-500 py-16">
                <p>Nenhum filme foi adicionado recentemente.</p>
            </div>
        @endif

    </div>

</body>
</html>