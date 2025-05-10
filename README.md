# API de Produtos - Laravel

Esta aplicação é uma API REST para gerenciar produtos, incluindo funcionalidades de criação, atualização, listagem e remoção de produtos.

## 🚀 Funcionalidades

* Listagem de produtos com filtros e seleção de campos específicos
* Criação de produtos
* Atualização de produtos
* Remoção de produtos
* Exibição de um produto específico

## 🛠️ Tecnologias Utilizadas

* Laravel 8
* PHP 8
* MySQL

## 📦 Instalação

1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
```

2. Acesse o diretório do projeto:

```bash
cd sua-api-laravel
```

3. Instale as dependências:

```bash
composer install
```

4. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente:

```bash
cp .env.example .env
```

5. Gere a chave da aplicação:

```bash
php artisan key:generate
```

6. Crie o banco de dados e execute as migrações:

```bash
php artisan migrate
```

7. Opcional: Popule a base de dados com dados iniciais:

```bash
php artisan db:seed
```

8. Inicie o servidor:

```bash
php artisan serve
```

A aplicação estará disponível em: `http://localhost:8000`

## 🔥 Rotas da API

* **GET /api/products** - Lista todos os produtos com filtros e seleção de campos.
* **POST /api/products** - Cria um novo produto.
* **GET /api/products/{id}** - Exibe um produto específico.
* **PUT /api/products** - Atualiza um produto.
* **DELETE /api/products/{id}** - Remove um produto.

### Exemplo de Requisição com Filtros e Campos

`GET /api/products?fields=name,price&coditions=price:>=:5;name:like:%Manga%`


## ✅ Regras de Validação

As seguintes regras de validação são aplicadas durante a criação e atualização dos produtos:

* `name` - Obrigatório
* `price` - Obrigatório
* `description` - Obrigatório
* `slug` - Obrigatório

## 📝 Estrutura do Projeto

* `app/Http/Controllers/Api/ProductController.php` - Controlador principal da API.
* `app/Repositories/ProductRepository.php` - Repositório para manipulação das queries.
* `app/Http/Requests/ProductRequest.php` - Classe para validação das requisições.
* `app/Http/Resources/ProductResource.php`- Classe para formatar o retorna da API do Produto.
* `routes/api.php` - Definição das rotas da API.


## 📄 Licença

Esse projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.
