# Projeto Factory Method em PHP

Este projeto é um exemplo prático de como implementar o padrão de design Factory Method em PHP, utilizando o Laravel como framework e Composer para gerenciamento de dependências.

## Tecnologias Utilizadas
- [PHP](https://www.php.net/): Linguagem de programação utilizada para desenvolver o projeto.
- [Laravel](https://laravel.com/): Framework utilizado para facilitar o desenvolvimento de aplicações PHP.
- [Composer](https://getcomposer.org/): Ferramenta de gerenciamento de projetos e compilação de código.
- [Docker](https://www.docker.com/): Plataforma utilizada para containerização da aplicação.
- [MySQL](https://www.mysql.com/): Sistema de gerenciamento de banco de dados utilizado.
- [Swagger](https://swagger.io/): Ferramenta para documentação de APIs.
- [PHPUnit](https://phpunit.de/): Ferramenta utilizada para realizar os testes unitários.


## Como subir o projeto

Para subir o projeto, você deve ter o Docker instalado em sua máquina. Em seguida, execute o seguinte comando:
```bash
docker-compose up --build -d
```

## Como acessar a documentação da API

Acesse a documentação da API através da seguinte URL: [Link para a documentação da API](http://localhost:8080/api/documentation)

Para atualizar a documentação da API, execute o seguinte comando:
```bash
make swagger
```

## Como rodar os testes
```
make test
```

## Coverage

Comando para criar ou atualizar o coverage dos testes:
```bash
make coverage
```

O relatório de cobertura de testes pode ser encontrado na seguinte URL: [Link para o relatório de cobertura](http://localhost:63342/factory-method-in-php/Coverage/html/index.html)


## Contribuições

Contribuições para este projeto são bem-vindas. Por favor, abra um problema ou uma solicitação de pull se você quiser contribuir.


## Autor

Matheus Tadeu - [LinkedIn](https://www.linkedin.com/in/matheus-tadeu-482a00134/)


## Licença

Este projeto está licenciado sob os termos da licença MIT.
