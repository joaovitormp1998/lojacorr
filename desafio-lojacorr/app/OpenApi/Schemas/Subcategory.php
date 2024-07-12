<?php
namespace App\OpenApi\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Subcategory",
 *     required={"name", "category_id"},
 *     @OA\Property(property="id", type="integer", format="int64", description="ID da subcategoria"),
 *     @OA\Property(property="name", type="string", description="Nome da subcategoria"),
 *     @OA\Property(property="category_id", type="integer", format="int64", description="ID da categoria pai")
 * )
 */
class Subcategory
{
    // (You don't need to add anything here if it's just a schema definition)
}
