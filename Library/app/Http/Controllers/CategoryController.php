<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    // Função para exibir uma lista de categorias
    public function index()
    {
        $categories = Category::with('books')->get();
        return view('categories.index', compact('categories'));
    }

    // Função para exibir uma categoria específica
    public function show($id)
    {
        $category = Category::with('books')->findOrFail($id);
        return view('categories.show', compact('category'));
    }

    // Função para exibir o formulário de criação de uma nova categoria
    public function create()
    {
        Gate::authorize('create', Category::class);
        return view('categories.create');
    }

    // Função para armazenar uma nova categoria no banco de dados
    public function store(Request $request)
    {
        Gate::authorize('create', Category::class);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
        ]);

        Category::create($validatedData);

        return redirect()->route('categories.index')->with('success', 'Categoria criada com sucesso!');
    }

    // Função para exibir o formulário de edição de uma categoria
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        Gate::authorize('update', $category);

        return view('categories.edit', compact('category'));
    }

    // Função para atualizar uma categoria no banco de dados
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        Gate::authorize('update', $category);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $id,
        ]);

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    // Função para excluir uma categoria do banco de dados
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Gate::authorize('delete', $category);

        $category->books()->detach();
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria excluída com sucesso!');
    }
}
