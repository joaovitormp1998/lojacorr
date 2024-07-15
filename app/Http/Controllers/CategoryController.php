<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Documentação da API de Categorias e Subcategorias",
 *      description="Esta documentação tem como objetivo facilitar os testes da API do desafio Lojacorr",
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 */
class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Listar Categorias",
     *     tags={"Categorias"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Category")
     *         )
     *     )
     * )
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * @OA\Post(
     *     path="/api/categories",
     *     summary="Criar nova categoria",
     *     tags={"Categorias"},
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Categoria registrada com sucesso",
     *         @OA\JsonContent(type="object", properties={
     *             @OA\Property(property="id", type="integer"),
     *             @OA\Property(property="name", type="string")
     *         })
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category = Category::create($request->all());

        return response()->json($category, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Consultar categoria por Identificador",
     *     tags={"Categorias"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/Category")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoria não encontrada"
     *     )
     * )
     */
    public function show($id)
    {
        return Category::findOrFail($id);
    }

    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     summary="Excluir categoria por Identificador",
     *     tags={"Categorias"},
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Categoria excluída com sucesso"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoria não encontrada"
     *     )
     * )
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return response(null, 204);
    }

    public function create()
    {
        return view('categories.create_category'); // Ajuste o nome da view conforme necessário
    }
    public function getSubcategories($categoryId)
    {
        $category = Category::find($categoryId);

        if (!$category) {
            return response()->json(['error' => 'Categoria não encontrada'], 404);
        }

        return response()->json($category->subcategories);
    }
}
