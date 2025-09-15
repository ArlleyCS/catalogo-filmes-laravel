<?php

namespace App\Http\Controllers;

use App\Models\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) // <-- ATUALIZADO AQUI
    {
        // Iniciamos a consulta (query)
        $query = Filme::query();

        // Verificamos se existe um parâmetro 'search' na URL
        if ($request->has('search') && $request->input('search') != '') {
            $searchTerm = $request->input('search');
            // Adicionamos a condição de busca pelo título
            $query->where('titulo', 'like', '%' . $searchTerm . '%');
        }

        // Executamos a consulta, pegando os resultados mais recentes e com paginação
        $filmes = $query->latest()->paginate(12);

        // Retornamos a view, passando os filmes encontrados
        return view('filmes.index', compact('filmes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('filmes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cover_url' => 'nullable|url', // Validação para o novo campo de pôster
            'sinopse' => 'required|string',
            'ano_lancamento' => 'required|integer|min:1888|max:' . date('Y', strtotime('+1 year')),
            'data_assistido' => 'nullable|date',
        ]);

        // Cria o novo filme no banco de dados
        Filme::create($request->all());

        // Redireciona para a lista de filmes com uma mensagem de sucesso
        return redirect()->route('filmes.index')
                         ->with('success', 'Filme cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Filme $filme)
    {
        return view('filmes.show', compact('filme'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Filme $filme)
    {
        return view('filmes.edit', compact('filme'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Filme $filme)
    {
        // Validação dos dados do formulário
        $request->validate([
            'titulo' => 'required|string|max:255',
            'cover_url' => 'nullable|url', // Validação para o novo campo de pôster
            'sinopse' => 'required|string',
            'ano_lancamento' => 'required|integer|min:1888|max:' . date('Y', strtotime('+1 year')),
            'data_assistido' => 'nullable|date',
        ]);

        // Atualiza o filme no banco de dados
        $filme->update($request->all());

        // Redireciona para a lista de filmes com uma mensagem de sucesso
        return redirect()->route('filmes.index')
                         ->with('success', 'Filme atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Filme $filme)
    {
        // Apaga o filme do banco de dados
        $filme->delete();

        // Redireciona para a lista de filmes com uma mensagem de sucesso
        return redirect()->route('filmes.index')
                         ->with('success', 'Filme apagado com sucesso!');
    }

    /**
     * Display a page with the latest movies.
     */
    public function latest()
    {
        // Pega os 12 filmes mais recentes
        $filmes = Filme::latest()->take(12)->get();

        // Retorna a nova view que vamos criar, passando a variável $filmes para ela
        return view('filmes.latest', compact('filmes'));
    }
}