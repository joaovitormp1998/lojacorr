<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use OpenApi\Annotations as OA;

class SubcategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/subcategories",
     *     tags={"Subcategorias"},
     *     summary="Listar subcategorias",
     *     description="Retorna uma lista de todas as subcategorias.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="Operação realizada com sucesso", @OA\JsonContent(ref="#/components/schemas/Subcategory"))
     * )
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return response()->json($subcategories);
    }

    /**
     * @OA\Post(
     *     path="/api/subcategories",
     *     tags={"Subcategorias"},
     *     summary="Criar uma nova subcategoria",
     *     description="Cria uma nova subcategoria com os dados fornecidos, associada a uma categoria existente.",
     *     security={{"bearerAuth":{}}},

     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "category_id"},
     *             @OA\Property(property="name", type="string", description="Nome da subcategoria"),
     *             @OA\Property(property="category_id", type="integer", description="ID da categoria associada")
     *         )
     *     ),
     *     @OA\Response(response="201", description="Subcategoria criada com sucesso"),
     *     @OA\Response(response="422", description="Erro de validação dos dados")
     * )
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:categories,id' // Ensure category exists
            ]);

            $subcategory = Subcategory::create([
                'name' => $request->name,
                'category_id' => $request->category_id
            ]);

            return response()->json(['message' => 'Subcategoria criada com sucesso'], 201);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro de validação dos dados', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao criar subcategoria', 'error' => $e->getMessage()], 500);
        }
    }
    /**
     * @OA\Get(
     *     path="/api/subcategories/{id}",
     *     tags={"Subcategorias"},
     *     summary="Exibir uma subcategoria específica",
     *     description="Retorna os detalhes de uma subcategoria com base no ID fornecido.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da subcategoria", @OA\Schema(type="integer")),
     *     @OA\Response(response="200", description="Operação realizada com sucesso", @OA\JsonContent(ref="#/components/schemas/Subcategory")),
     *     @OA\Response(response="404", description="Subcategoria não encontrada")
     * )
     */
    public function show(Subcategory $subcategory)
    {
        return response()->json($subcategory);
    }

    /**
     * @OA\Put(
     *     path="/api/subcategories/{id}",
     *     tags={"Subcategorias"},
     *     summary="Atualizar uma subcategoria",
     *     description="Atualiza os dados de uma subcategoria com base no ID fornecido.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da subcategoria", @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Subcategory")
     *     ),
     *     @OA\Response(response="200", description="Subcategoria atualizada com sucesso", @OA\JsonContent(ref="#/components/schemas/Subcategory")),
     *     @OA\Response(response="404", description="Subcategoria não encontrada"),
     *     @OA\Response(response="422", description="Erro de validação dos dados")
     * )
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        try {
            // Validação dos dados de entrada
            $request->validate([
                'name' => 'required|string|max:255',
                // Adicione aqui outras regras de validação conforme necessário
            ]);

            // Atualização da subcategoria
            $subcategory->update($request->all());

            return response()->json($subcategory);
        } catch (ValidationException $e) {
            return response()->json(['message' => 'Erro de validação dos dados', 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erro ao atualizar subcategoria', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/subcategories/{id}",
     *     tags={"Subcategorias"},
     *     summary="Excluir uma subcategoria",
     *     description="Exclui uma subcategoria com base no ID fornecido.",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(name="id", in="path", required=true, description="ID da subcategoria", @OA\Schema(type="integer")),
     *     @OA\Response(response="204", description="Subcategoria excluída com sucesso"),
     *     @OA\Response(response="404", description="Subcategoria não encontrada")
     * )
     */
    public function destroy(Subcategory $subcategory)
    {
        $subcategory->delete();
        return response()->json(null, 204);
    }
    public function create()
    {
        $categories = Category::all();

        return view('subcategories.create_subcategory',compact('categories'));
    }
}
