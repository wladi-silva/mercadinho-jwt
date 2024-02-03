
# Desafio técnico: Desenvolvedor de Software 🚀

Desenvolver um sistema de Ponto de Venda (PDV)

## Estrutura do Projeto:

- A lógica central está nas classes Produto e Venda, seguindo os princípios da Programação Orientada a Objetos (POO).
- Utilizei exceções (QuantidadeInvalidaException, PrecoInvalidoException e QuantidadeInsuficienteException) para tratar erros relacionados a quantidade e preço de produtos e estoque.
- A classe BancoDadosMemoria simula um banco de dados em memória para armazenar produtos e vendas.
- Utilizei o padrão MVC para uma melhor arquitetura do projeto.

## Produtos

![Produtos](./assets/images/readme/cadastro-produtos.png)

## Vendas

![Vendas](./assets/images/readme/venda-produtos.png)

## Como Executar:

- Clone o repositório: git clone https://github.com/wladi-silva/mercadinho-jwt.git
- Abra o projeto em um servidor PHP (por exemplo, XAMPP ou Apache).
- Acesse a página principal: http://localhost/mercadinho-jwt

## Tratamento de Erros

![Exception Quantidade](./assets/images/readme/exception-quantidade.png)

![Exception Insuficiente](./assets/images/readme/exception-insuficiente.png)

## Funcionalidades Implementadas:
- <h3>Cadastro de Produtos:</h3>
![Produtos](./assets/images/readme/cadastro-produtos.png)
- <h3>Listagem de Produtos:</h3>
![Listagem Produtos](./assets/images/readme/listagem-produtos.png)
- <h3>Venda de Produtos:</h3>
![Vendas](./assets/images/readme/venda-produtos.png)
- <h3>Listagem de Vendas:</h3>
![Listagem Produtos](./assets/images/readme/listagem-vendas.png)

## Extra
- Com a utilização do Banco em Memória, ao vender um produto, ele é automaticamente descontado da tela de produtos.
