# Projeto LojaCorr

Este é um projeto Laravel para a aplicação LojaCorr.

## Pré-requisitos

Antes de começar, verifique se você possui os seguintes requisitos instalados em sua máquina:

- **Docker**: [Instalação do Docker](https://docs.docker.com/get-docker/)
- **Docker Compose**: [Instalação do Docker Compose](https://docs.docker.com/compose/install/) (geralmente já está incluído na instalação do Docker no Windows e no macOS)

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

* O projeto estará disponivel no endereço:
 ```bash
   http://localhost:8000

 ```
 * A api para efetuar teste está disponivel em: 
 ```bash
   http://localhost:8000/api/docs

 ```
