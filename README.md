# Projeto Controlador Series

Este é o repositório do projeto Controlador Series, uma aplicação desenvolvida para gerenciar séries de TV. Nesta aplicação, os usuários podem adicionar séries, episódios e gerenciar seu progresso de visualização.

## Instalações Obrigatórias

Antes de começar a usar o projeto Controlador Series, certifique-se de ter as seguintes instalações:

- **Git**: Para clonar o repositório.
- **Composer**: Para instalar as dependências do projeto.

## Passo a Passo

Siga estas etapas para configurar e executar o projeto Controlador Series:

1. **Clonar o Repositório**:
   ```bash
   git clone https://github.com/Gustavo-Vinicius-Santana/controlador-series

2. **Instalar o Composer na Pasta do Repositório:**:
   ```bash
   cd controlador-series
   composer install

3. **Transformar o .env.example em .env:**:
   ```bash
    cp .env.example .env

4. **Gerar uma Chave de Aplicativo:**:
   ```bash
   php artisan key:generate

5. **Realizar as Migrações:**:
   ```bash
   php artisan migrate

6. **Rodar o Projeto:**:
   ```bash
   php artisan serve

## Funcionalidades
- Cadastro de séries
- Listagem de séries
- Edição de séries
- Exclusão de séries
-  Cadastro de usuário
- Login de usuário
