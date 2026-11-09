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

## Como rodar

1. Suba um ambiente com PHP e MySQL.
2. Crie a tabela acima e insira alguns itens.
3. Ajuste as credenciais (veja a ressalva abaixo).
4. Sirva a pasta:

```bash
php -S localhost:8000
```

## Ressalvas (código de 2021)

- **Credenciais no repositório.** Pior: a chamada `mysqli_connect` está duplicada — uma vez em `conexao.php` e outra vez dentro do próprio `index.php`, com host, usuário e senha de um banco ClearDB do Heroku escritos no código. O serviço foi descontinuado e as credenciais estão mortas. O `conexao.php` acaba sendo código morto, já que o `index.php` abre a própria conexão.
- Sem paginação e sem escape de saída na montagem do HTML.
