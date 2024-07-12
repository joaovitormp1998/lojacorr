<?php

namespace App\OpenApi\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="UserLoginRequest",
 *     required={"name", "email", "password"},
 *     @OA\Property(property="email", type="string", format="email", example="joao@email.com"),
 *     @OA\Property(property="password", type="string", format="password", example="senha123")
 * )
 */
class UserLoginRequest
{
    // (You don't need to add anything here if it's just a schema definition)
}
