# Projeto LojaCorr

Este é um projeto Laravel para a aplicação LojaCorr.

Utilizei a versão 9 do Laravel bem como criei components usando vue

## Pré-requisitos

Antes de começar, verifique se você possui os seguintes requisitos instalados em sua máquina:

- **Docker**: [Instalação do Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Instalação do Docker Compose](https://docs.docker.com/compose/install/)

## Configuração do Ambiente

1. **Clone o repositório:**

   ```bash
   git clone https://github.com/joaovitormp1998/lojacorr
   cd lojacorr
   ```

2. **Copie o arquivo de exemplo de ambiente:**

    ```bash
    cp .env.example .env
    ```

## Executando o projeto

 ```bash
    docker-compose up -d --build

 ```

- O projeto estará disponivel no endereço:

 ```bash
   http://localhost:8000

 ```

- A api para efetuar teste está disponivel em:

 ```bash
   http://localhost:8000/api/docs

 ```

## Exemplos de Interface

- **Documentação da API:**
  ![Documentação da API](image-7.png)

- **Registro de usuário:**

  ```json
  {
    "name": "João Silva",
    "email": "joao@email.com",
    "password": "senha123"
  }
    ```

- **Login:**

  ```json
  {
    "email": "joao@email.com",
    "password": "senha123"
  }
    ```
Problema
--------

Este desafio envolve lógica e planejamento financeiro aplicado à compra de imóveis. Suponha que existem **X** casas à venda, e o valor total combinado dessas casas é **I** reais. Você tem um orçamento de **B** reais para gastar. A questão é determinar qual é o maior número de casas que você pode comprar dentro do orçamento disponível.

### Objetivo

O objetivo é calcular o máximo de casas que podem ser compradas sem exceder o orçamento **B**.

### Entradas

*   **budget**: O orçamento disponível (em reais).
    
*   **housePrices**: Uma lista de preços das casas disponíveis.
    

### Saídas

Ao final do processamento, o programa deve exibir:

1.  A quantidade de casas compradas.
    
2.  O valor total gasto.
    
3.  A soma total dos valores das casas disponíveis.
    

### Exemplo de Solução em PHP
  ```bash
public function calculateMaxHouses(Request $request)
{
    $budget = $request->input('budget');
    $housePrices = $request->input('housePrices');


    // Ordenar os preços das casas em ordem crescente
    sort($housePrices);
    $totalHouseValue = array_sum($housePrices);


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
        'Soma das casas' => 'R$ ' . number_format($totalHouseValue, 2, ',', '.'),
        'Quantidade Comprada' => $housesBought,
        'Total Gasto' => 'R$ ' . number_format($totalSpent, 2, ',', '.'),
    ]);
}




```
### Explicação

1.  **Ordenação dos Preços**: Primeiramente, os preços das casas são ordenados em ordem crescente para garantir que tentemos comprar as casas mais baratas primeiro. Isso maximiza o número de casas que podem ser compradas dentro do orçamento disponível.
    
2.  **Inicialização das Variáveis**: Variáveis para o total gasto (totalSpent) e o número de casas compradas (housesBought) são inicializadas em zero.
    
3.  **Iteração e Compra**: O código então percorre a lista de preços ordenados, somando o preço de cada casa ao totalSpent, desde que a soma não ultrapasse o orçamento. Cada vez que uma casa é comprada, o contador housesBought é incrementado.
    
4.  **Retorno do Resultado**: Finalmente, o programa retorna um JSON com a soma total dos valores das casas disponíveis, a quantidade de casas compradas, e o valor total gasto.

![alt text](image-10.png)
    Caso o orçamento não atenda

  ```json
  {
  "budget": 300,
  "housePrices": [
    10,20,60,100
  ] }
```
![alt text](image-11.png)
    Caso o orçamento  atenda

  ```json
  {
  "budget": 300,
  "housePrices": [
    100,100,100
  ] }
```
Extras
![alt text](image-1.png)
![alt text](image-2.png)
![alt text](image-3.png)
![alt text](image-4.png)
![alt text](image-5.png)
![alt text](image-6.png)

