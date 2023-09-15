
<h1 align="center">REST API - Controle de despesas</h1>

## Sobre a API

<br/>
Trata-se de uma API PHP Laravel que serve ao frontend um CRUD de controle de despesas.

## Postman

<br/>
Baixe aqui a collection do postman no final da documentação: https://guilhermejulio.notion.site/Documenta-o-Operacional-Sistema-de-Despesas-5825f7d380b74dfd904d8d755387c47e?pvs=4

Rotas: 
- GET /api/auth/user
- POST /api/auth/login
- POST /api/auth/register
- POST /api/auth/logout
- GET /api/expenses/stats
- POST /api/expenses
- PUT /api/expenses/{expenseId}
- DELETE /api/expenses/{expenseId}
- GET /api/expenses/
- GET /api/expenses/{expenseId}

## Execução local

<br/>
Para execução local siga os passos

1. Crie o .env a partir do arquivo .env.example
2. Execute os comandos
- ./vendor/bin/sail up -d
- ./vendor/bin/sail ./vendor/bin/sail artisan migrate
3. A aplicação estará de pé na porta 3000.

## Banco de dados

<br/>
O banco de dados usado é o MySQL, um container do MySQL e do redis é criado ao rodar o sail up.

