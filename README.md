# phpfeira — Cardápio de Pratos

Cardápio de pratos em PHP puro (padrão MVC), com CRUD completo (cadastrar, listar, editar, deletar) usando MySQL.

> Esta versão é o mesmo projeto (mesma lógica/estrutura já corrigida), apenas com o tema trocado de "catálogo de jogos" para "cardápio de comidas".

## Como rodar localmente

1. Instale um ambiente PHP + MySQL (ex: [XAMPP](https://www.apachefriends.org/pt_br/index.html), [Laragon](https://laragon.org/) ou WAMP).
2. Importe o `database.sql` no seu MySQL (via phpMyAdmin, HeidiSQL, ou linha de comando):
   ```
   mysql -u root -p < database.sql
   ```
3. Confira as credenciais em `config/conexao.php` (usuário `root`, senha em branco por padrão — ajuste se o seu MySQL usar outra senha).
4. Coloque a pasta do projeto dentro do diretório servido pelo Apache (ex: `htdocs/phpfeira` no XAMPP, `www/phpfeira` no Laragon).
5. Acesse no navegador: `http://localhost/phpfeira/public/`

## Estrutura

```
config/          → conexão com banco e constantes de caminho
models/          → PratosModel (regras de acesso ao banco)
controllers/     → PratosController (orquestra model e view)
views/pratos/    → telas (listar, cadastrar, editar)
public/          → index.php (front controller / ponto de entrada)
database.sql     → script para criar o banco "comidas" e a tabela "pratos"
```

## Campos de um prato

- **nome** — nome do prato
- **tempo_preparo** — tempo de preparo em minutos
- **nota** — avaliação de 0 a 5
- **categoria** — entrada, prato_principal, sobremesa ou bebida
