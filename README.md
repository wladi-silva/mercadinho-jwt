
# Desafio técnico: Desenvolvedor de Software 🚀

Desenvolver um sistema de Ponto de Venda (PDV) para o
cliente: Mercadinho JWT.

## Estrutura do Projeto:

- A lógica central está nas classes Produto e Venda, seguindo os princípios da Programação Orientada a Objetos (POO).
- Utilizei exceções (QuantidadeInvalidaException, PrecoInvalidoException e QuantidadeInsuficienteException) para tratar erros relacionados a quantidade e preço de produtos e estoque.
- A classe BancoDadosMemoria simula um banco de dados em memória para armazenar produtos e vendas.
- Utilizei o padrão MVC para uma melhor arquitetura do projeto.

## Produtos

![Produtos](./assets/images/readme/cadastro-produtos.png)

## Como Executar:

- Clone o repositório: git clone https://github.com/wladi-silva/mercadinho-jwt.git
- Abra o projeto em um servidor PHP (por exemplo, XAMPP ou Apache).
- Acesse a página principal: http://localhost/mercadinho-jwt

## Tratamento de Erros

![Exception Quantidade](./assets/images/readme/exception-quantidade.png)

![Exception Insuficiente](./assets/images/readme/exception-insuficiente.png)

## Funcionalidades Implementadas:
Cadastro de Produtos:
![Produtos](./assets/images/readme/cadastro-produtos.png)

Listagem de Produtos:
![Listagem Produtos](./assets/images/readme/listagem-produtos.png)

Venda de Produtos:
![Vendas](./assets/images/readme/venda-produtos.png)

Listagem de Vendas:
![Listagem Produtos](./assets/images/readme/listagem-vendas.png)

## Extra

- Com a utilização do Banco em Memória, ao vender um produto, ele é automaticamente descontado da tela de produtos
