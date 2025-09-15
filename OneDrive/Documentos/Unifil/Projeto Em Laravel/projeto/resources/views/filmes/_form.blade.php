@csrf
{{-- Título --}}
<div class="mb-4">
    <label for="titulo" class="block text-sm font-medium text-gray-300">Título</label>
    <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $filme->titulo ?? '') }}"
           class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('titulo') border-red-500 @enderror" required>
    @error('titulo')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
</div>

{{-- URL do Pôster --}}
<div class="mb-4">
    <label for="cover_url" class="block text-sm font-medium text-gray-300">URL do Pôster</label>
    <input type="url" name="cover_url" id="cover_url" value="{{ old('cover_url', $filme->cover_url ?? '') }}"
           class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('cover_url') border-red-500 @enderror">
    @error('cover_url')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
</div>

{{-- Sinopse --}}
<div class="mb-4">
    <label for="sinopse" class="block text-sm font-medium text-gray-300">Sinopse</label>
    <textarea name="sinopse" id="sinopse" rows="4"
              class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('sinopse') border-red-500 @enderror" required>{{ old('sinopse', $filme->sinopse ?? '') }}</textarea>
    @error('sinopse')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
</div>

{{-- Ano e Data --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
    <div>
        <label for="ano_lancamento" class="block text-sm font-medium text-gray-300">Ano de Lançamento</label>
        <input type="number" name="ano_lancamento" id="ano_lancamento" value="{{ old('ano_lancamento', $filme->ano_lancamento ?? '') }}"
               class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('ano_lancamento') border-red-500 @enderror" required>
        @error('ano_lancamento')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>
    <div>
        <label for="data_assistido" class="block text-sm font-medium text-gray-300">Data em que assistiu (Opcional)</label>
        <input type="date" name="data_assistido" id="data_assistido" value="{{ old('data_assistido', $filme->data_assistido ?? '') }}"
               class="mt-1 block w-full bg-gray-700 border-gray-600 text-white rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('data_assistido') border-red-500 @enderror">
        @error('data_assistido')<p class="mt-2 text-sm text-red-500">{{ $message }}</p>@enderror
    </div>
</div>

{{-- Botões --}}
<div class="flex items-center justify-end mt-6">
    <a href="{{ route('filmes.index') }}" class="text-sm text-gray-400 hover:text-white mr-4">
        Cancelar
    </a>
    <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
        Salvar
    </button>
</div>