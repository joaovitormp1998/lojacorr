<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertIsArray;

// Função para calcular casas com orçamento
function calcularCasasComOrçamento($X, $I, $B) {
    // Calcula o preço médio por casa
    $preco_medio = $I / $X;

    // Calcula o número máximo de casas que podem ser compradas
    $casas_compradas = floor($B / $preco_medio);

    // Calcula o valor total gasto
    $valor_gasto = $casas_compradas * $preco_medio;

    // Retorna o resultado como um array associativo
    return [
        'casas_compradas' => $casas_compradas,
        'valor_gasto' => $valor_gasto
    ];
}

class CalculadoraCasasTest extends TestCase
{
    public function testCalcularCasasComOrçamento()
    {
        // Dados de entrada para o teste
        $X = 10;  // Número total de casas
        $I = 100000;  // Valor total das casas
        $B = 35000;  // Orçamento disponível

        // Chama a função para obter o resultado
        $resultado = calcularCasasComOrçamento($X, $I, $B);

        // Verificações de assertiva
        assertIsArray($resultado);  // Verifica se o resultado é um array
        assertEquals(3, $resultado['casas_compradas']);  // Verifica se o número máximo de casas compradas é 3
        assertEquals(30000, $resultado['valor_gasto']);  // Verifica se o valor total gasto é 30000
    }
}
