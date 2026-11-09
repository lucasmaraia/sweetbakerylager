# sweetbakerylager

Página de consulta do estoque da confeitaria do projeto [sweetbakery](https://github.com/lucasmaraia/sweetbakery): lê a tabela `Estoque` no MySQL e lista os itens em uma tabela HTML.

> Projeto de faculdade (março/2021). Era o complemento administrativo do site principal, no começo dos meus estudos de PHP.

## Stack

- PHP (procedural, com `mysqli`)
- MySQL
- HTML e CSS

## Estrutura

```
index.php   → conexão, consulta e renderização da tabela
conexao.php → arquivo de conexão separado (não utilizado pelo index.php)
estilo.css  → estilos da tabela
```

## Banco de dados

```sql
CREATE TABLE Estoque (
  id INT AUTO_INCREMENT PRIMARY KEY,
  descricao VARCHAR(255),
  valor DECIMAL(10,2),
  quantidade INT
);
```

A consulta é `SELECT id, descricao, valor, quantidade FROM Estoque`. Quando não há registros, a página exibe `0 resultado`.

## Configuração

A conexão com o banco é lida de variáveis de ambiente, com valores padrão para um MySQL local:

| Variável      | Padrão      |
|---------------|-------------|
| `DB_HOST`     | `localhost` |
| `DB_USER`     | `root`      |
| `DB_PASSWORD` | vazio       |
| `DB_NAME`     | `sweetbakerylager` |

```bash
export DB_HOST="localhost"
export DB_USER="root"
export DB_PASSWORD="sua-senha"
export DB_NAME="sweetbakerylager"
```

No Windows (PowerShell), use `$env:DB_USER = "root"`.

## Como rodar

1. Suba um ambiente com PHP e MySQL.
2. Crie a tabela acima e insira alguns itens.
3. Configure as variáveis de ambiente do banco (veja a seção acima).
4. Sirva a pasta:

```bash
php -S localhost:8000
```

## Ressalvas (código de 2021)

- ~~**Credenciais no repositório.**~~ **Corrigido:** as duas chamadas `mysqli_connect` (uma em `conexao.php` e outra dentro do próprio `index.php`) agora leem variáveis de ambiente. As credenciais antigas (um banco ClearDB do Heroku) seguem no histórico de commits, mas o serviço foi descontinuado e elas estão mortas.
- **Conexão duplicada.** O `conexao.php` continua sendo código morto: o `index.php` abre a própria conexão em vez de incluí-lo. O certo seria um `include_once` e uma única definição.
- Sem paginação e sem escape de saída na montagem do HTML.
