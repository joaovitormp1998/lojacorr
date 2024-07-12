<?php

namespace App\OpenApi\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="UserRegisterRequest",
 *     required={"name", "email", "password"},
 *     @OA\Property(property="name", type="string", example="João Silva"),
 *     @OA\Property(property="email", type="string", format="email", example="joao@email.com"),
 *     @OA\Property(property="password", type="string", format="password", example="senha123")
 * )
 */
class UserRegisterRequest
{
    // (You don't need to add anything here if it's just a schema definition)
}
