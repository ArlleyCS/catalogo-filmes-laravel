Catálogo de Filmes em Laravel

Este é um projeto de CRUD (Criar, Ler, Atualizar, Apagar) de filmes, desenvolvido como parte de um exercício prático com Laravel 11 e Blade. O objetivo foi construir uma aplicação funcional, com boas práticas, validações e uma interface de usuário agradável.

---

O Que Foi Implementado

O sistema possui as seguintes funcionalidades:

* Autenticação de Usuários: As páginas do catálogo são protegidas e só podem ser acessadas por usuários logados.
* CRUD Completo de Filmes:
    * Listar: Exibe os filmes cadastrados em um layout de cards visuais e responsivos.
    * Criar: Formulário para adicionar novos filmes ao catálogo.
    * Ver: Página de detalhes para cada filme, com pôster e informações completas.
    * Editar: Formulário para atualizar as informações de um filme existente.
    * Apagar: Funcionalidade para remover um filme do catálogo.
* Validação de Formulários: As entradas dos usuários são validadas no backend, com mensagens de erro claras exibidas no formulário.
* Mensagens de Feedback: O usuário recebe mensagens de sucesso (flash messages) após cada ação bem-sucedida (criação, atualização e exclusão).
* Funcionalidade Bônus:
    * Busca por Título: A página de listagem possui uma barra de busca para filtrar filmes pelo título.
    * Paginação: Os resultados da busca e da listagem são paginados para melhor performance.
* Página Pública de "Últimos Filmes": Uma rota pública (`/ultimos-filmes`) foi criada para exibir uma vitrine com os filmes mais recentes adicionados ao catálogo, com um design simples e separado do painel de controle.

---

Como Instalar e Rodar o Projeto

Pré-requisitos:
* PHP >= 8.2
* Composer
* Node.js e NPM
* Um servidor de banco de dados (o projeto está configurado para usar SQLite por padrão).

Passo a Passo:

1. Clone o repositório:
    ```bash
    git clone [https://github.com/ArlleyCS/catalogo-filmes-laravel.git](https://github.com/ArlleyCS/catalogo-filmes-laravel.git)
    cd catalogo-filmes-laravel
    ```

2. Instale as dependências do PHP:
    ```bash
    composer install
    ```

3. Instale as dependências do JavaScript:
    ```bash
    npm install
    ```

4. Crie o arquivo de ambiente:
    ```bash
    cp .env.example .env
    ```

5. Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```

6. Configure o banco de dados SQLite:
    * Abra o arquivo `.env`.
    * Garanta que a linha `DB_CONNECTION` esteja como `DB_CONNECTION=sqlite`.
    * Apague ou comente as outras variáveis de `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, e `DB_PASSWORD`.

7. Crie o arquivo do banco de dados:
    ```bash
    touch database/database.sqlite
    ```

8. Rode as migrações para criar as tabelas no banco de dados:
    ```bash
    php artisan migrate
    ```

9. Inicie os servidores (em dois terminais separados):
    * No Terminal 1, inicie o servidor do Laravel:
        ```bash
        php artisan serve
        ```
    * No Terminal 2, inicie o servidor do Vite (para CSS e JS):
        ```bash
        npm run dev
        ```

10. Acesse a aplicação no seu navegador: http://localhost:8000

---

Usuário/Senha de Teste

Após rodar o projeto, você pode se registrar com um novo usuário para testar. Use as seguintes credenciais ou crie as suas próprias:

* E-mail: `usuario@teste.com`
* Senha: `password`
