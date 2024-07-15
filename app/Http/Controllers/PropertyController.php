<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Subcategory;
use Auth;
use Illuminate\Support\Facades\Redirect;

class PropertyController extends Controller
{
    // Listar todas as propriedades
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    // Mostrar o formulário para criar uma nova propriedade
    public function create()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('properties.create_property', compact('categories', 'subcategories'));
    }

    // Armazenar uma nova propriedade
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'subcategory_id' => 'required|exists:subcategories,id',
            'name' => 'required',
            'date' => 'required|date',
            'value' => 'required|numeric',
            'status' => 'required',
            'responsible' => 'required',
        ]);

        // Adiciona o user_id ao validatedData
        $validatedData['user_id'] = Auth::id();

        $property = Property::create($validatedData);

        return redirect()->route('dashboard')->with('success', 'Propriedade criada com sucesso!');
    }

    // Mostrar uma propriedade específica
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }

    // Mostrar o formulário para editar uma propriedade existente
    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('properties.edit', compact('property', 'categories', 'subcategories'));
    }

    public function update(Request $request, Property $property)
    {
        $property->update([
            'name' => $request->editName,
            'value' => $request->editValue,
            // Update other fields as necessary
        ]);

        return redirect()->back()->with('success', 'Property updated successfully!');
    }

    public function destroy(Property $property)
    {
        $property->delete();

        return redirect()->back()->with('success', 'Property deleted successfully!');
    }
}
