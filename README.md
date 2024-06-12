# :factory: Projeto Factory Method em PHP

Este projeto é um exemplo de implementação do padrão de design criacional Factory Method em PHP. Ele demonstra como criar objetos sem especificar a classe exata a ser criada.

## Tecnologias Utilizadas

- PHP
- Laravel
- Docker
- Swagger

## Como Executar o Projeto

Para executar este projeto, você precisa ter o Docker instalado em sua máquina. Depois de clonar o repositório, você pode iniciar o projeto usando o seguinte comando:

```bash
docker-compose up -d
```

Este comando irá iniciar todos os serviços necessários para o projeto em containers Docker.


## Documentação da API

A documentação da API para este projeto está disponível através do Swagger. Você pode acessar a documentação da API navegando para o seguinte URL após iniciar o projeto:

```
http://localhost:9000/api/documentation
```

Substitua `localhost:9000` pelo endereço e porta corretos se você estiver executando o projeto em um ambiente diferente.


## Executando os Testes

Para executar os testes, você pode usar o seguinte comando:

```bash
docker-compose exec app ./vendor/bin/phpunit
```

## Coverage

O relatório de cobertura de testes pode ser encontrado na seguinte URL: [Link para o relatório de cobertura](http://localhost:63342/creational-pattern-factory-method-in-php/tests/Coverage/html/index.html)

## :bulb: Padrão Factory Method

O padrão Factory Method é um padrão de design criacional que fornece uma interface para criar objetos em uma superclasse, mas permite que as subclasses alterem o tipo de objetos que serão criados.

Neste projeto, o padrão Factory Method é usado para criar diferentes tipos de botões e postagens em mídias sociais, dependendo da plataforma especificada.


## Contribuições

Contribuições para este projeto são bem-vindas. Por favor, abra um problema ou uma solicitação de pull se você quiser contribuir.


## Autor

Matheus Tadeu - [LinkedIn](https://www.linkedin.com/in/matheus-tadeu-482a00134/)


## :books: Referências

Este projeto foi baseado nos conceitos e exemplos encontrados no [Refactoring Guru](https://refactoring.guru/).


## Licença

Este projeto está licenciado sob os termos da licença MIT.
