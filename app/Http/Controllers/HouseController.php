<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HouseController extends Controller
{

    /**
    * @OA\Post(
    *     path="/api/calculateMaxHouses",
    *     summary="Calculo de máximo de casas para comprar",
    *     description="Calculando o maximo numero de casas que se pode comprar a partir de um orçamento x.",
    *     tags={"Calculo de Casas"},
    *     @OA\RequestBody(
    *         required=true,
    *         @OA\MediaType(
    *             mediaType="application/json",
    *             @OA\Schema(
    *                 type="object",
    *                 required={"budget", "housePrices"},
    *                 @OA\Property(property="budget", type="number", description="Orçamento para comprar casas."),
    *                 @OA\Property(
    *                     property="housePrices",
    *                     type="array",
    *                     @OA\Items(type="number"),
    *                     description="Lista de preços de casa."
    *                 )
    *             )
    *         )
    *     ),
    *     @OA\Response(
    *         response=200,
    *         description="Successful calculation",
    *         @OA\JsonContent(
    *             type="object",
    *             @OA\Property(property="housesBought", type="integer", description="O numero de casas que se é possivel comprar"),
    *             @OA\Property(property="totalSpent", type="number", description="Total gasto com a comprar de casas")
    *         )
    *     ),
    *     @OA\Response(
    *         response=422,
    *         description="Validation error or missing parameters"
    *     )
    * )
    */
    public function calculateMaxHouses(Request $request)
    {
        $budget = $request->input('budget');
        $housePrices = $request->input('housePrices');

        // Ordenar os preços das casas em ordem crescente
        sort($housePrices);
        $totalHouseValue =array_sum($housePrices);

        $totalSpent = 0;
        $housesBought = 0;

        // Tente comprar o máximo de casas possível dentro do orçamento
        foreach ($housePrices as $price) {
            if ($totalSpent + $price <= $budget) {
                $totalSpent += $price;
                $housesBought++;
            } else {
                break;
            }
        }

        return response()->json([
            'Soma das casas'=> 'R$ ' . number_format($totalHouseValue, 2, ',','.'),
            'Quantidade Comprada' => $housesBought,
            'Total Gasto' => 'R$ ' . number_format($totalSpent, 2, ',', '.'),
        ]);
    }
}
