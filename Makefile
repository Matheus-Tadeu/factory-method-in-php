.PHONY: test

# Caminho para o PHPUnit
PHPUNIT=vendor/phpunit/phpunit/phpunit

# Alvo para rodar todos os testes
test:
	$(PHPUNIT)

#Atualizar ou criar coverage
coverage:
	XDEBUG_MODE=coverage $(PHPUNIT) --coverage-html tests/Coverage/

#Atualizar documentação Swagger
swagger:
	php artisan l5-swagger:generate
