Blog Sample
==================================================

This sample is based on the Hello World sample and it shows how to:

  * Integrate your web site with the Doctrine library
  * Initialize the database schema
  * Use the entity manager
  * Create entities and define relationships between entities
  * Create repositories

> Alteramos o projeto para 
## TODOS OS COMANDOS ABAIXO PRESSUPÕE QUE VOCÊ ESTEJA DENTRO DA PASTA DO PROJETO

## Usando Docker

Copie e altere os valores das variáveis de ambiente:

```
cp .env.DIST .env
```

Agore entre na pasta do projeto e executar o docker:

```
docker-compose up
```

## Installation

You need to have Apache 2.4 HTTP server, PHP v.5.6 or later and MySQL v.5.6 or later.

Download the sample to some directory (it can be your home dir or `/var/www/html`) and run Composer as follows:

```
docker-compose exec php bash
composer install
```

The command above will install the dependencies (Zend Framework and Doctrine).

Enable development mode:

```
composer development-enable
```

Adjust permissions for `data` directory:

```
chown -R www-data:www-data data
chmod -R 775 data
```

Confirme que o banco de dados está erguido e funcionando acessando a url abaixo:

http://localhost:9001/?server=db&username=root&db=unicesumar

Deverá acessar com o usuário e senha configurado em .env e mostrar o banco de dados Unicesumar.

Isso quer dizer que a conexão com o banco e o adminer está OK, por isso, agora vamos focar na conexão
com banco pela aplicação zend.

Create `config/autoload/local.php` config file by copying its distrib version:

```
cp config/autoload/local.php.dist config/autoload/local.php
```

Edit `config/autoload/local.php` and set database password parameter.

```
./vendor/doctrine/doctrine-module/bin/doctrine-module orm:schema-tool:update --force
```

Now you should be able to see the Blog website by visiting the link "http://localhost/". 
 
## License

This code is provided under the [BSD-like license](https://en.wikipedia.org/wiki/BSD_licenses). 

## Contributing

If you found a mistake or a bug, please report it using the [Issues](https://github.com/olegkrivtsov/using-zf3-book-samples/issues) page. Your feedback is highly appreciated.
