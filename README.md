# TDD com PHP  [INSTÁVEL - PENDENTE DE REVISÃO E CORREÇÃO]

Esse projeto tem a intenção de mostrar como é simples realizar teste unitários com PHP.

Os pré-requisitiso para esse tuturial, são:
  - PHP 5 (ou superiores)
  - PHPunit (Estou utilizando a versão 4.5.0)
  - Linux (É o meu sistema de trabalho e uso pessoal, não uso windows)

### Instalação do PHPUnit via terminal
realizamos o download do PHPUnit usando o comando wget
```sh
$ wget https://phar.phpunit.de/phpunit.phar
```
Em seguida, damos permissão de execução para o arquivo .phar que acabamos de baixar.

```
$ sudo chmod +x phpunit.phar
```
Vamos criar um diretório chamado phpunit dentro de `/usr/local/bin/`
```
$ sudo mkdir /usr/local/bin/phpunit
$ sudo chmod -R 755 /usr/local/bin/phpunit
```

Agora movemos o arquivo phpunit.phar para `/usr/local/bin/phpunit`
```
$ mv phpunit.phar /usr/local/bin/phpunit
```
Por fim vamos criar um arquivo `composer.json` dentro do diretório que criamos
```
$ cd /usr/local/bin/phpunit
$ nano composer.json
```
Dentro de `composer.json` colocaremos o seguinte conteúdo:
```
{   
    "require-dev": {
        "phpunit/phpunit": "4.5.*"
    }
}
```
Para finalizar essa instalação, digitamos o comando:
```
$ curl -sS https://getcomposer.org/installer | php
```
Obs.: Caso você tenha erro, faça esse curl -sS ... Senão rode direto o comando abaixo (sem precisar baixar um novo .phar).
```
$ php composer.phar install
```
Okay, com tudo instalado, você irá ver uma tela com vários loads de arquivos e uma mensagem ao final, como esta aqui:
```
....
sebastian/global-state suggests installing ext-uopz (*)
phpdocumentor/reflection-docblock suggests installing dflydev/markdown (~1.0)
phpdocumentor/reflection-docblock suggests installing erusev/parsedown (~1.0)
phpunit/php-code-coverage suggests installing ext-xdebug (>=2.2.1)
phpunit/phpunit suggests installing phpunit/php-invoker (~1.1)
Writing lock file
Generating autoload files

```

Agora vamos criar um diretorio de projeto `projeto` dentro da sua htdocs.
```
$ mkdir projeto
```
também criaremos dois diretório dentro do diretorio projetos, que são:
```
$ mkdir projetos/src
$ mkdir projetos/tests
```
Criamos dois arquivos .php, um para cada diretorio `projeto/src/Money.php` e `projeto/tests/MoneyTest.php`

Dentro do `projeto/src/Money.php` adicionamos o seguinte conteúdo:
```
<?php
class Money
{
    private $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function negate()
    {
        return new Money(-1 * $this->amount);
    }
    // ...
}
```

Em seguida, dentro do `projeto/tests/MoneyTest.php` adicionamos o seguinte conteúdo:
```
<?php
class MoneyTest extends PHPUnit_Framework_TestCase
{

	public function testCanBeNegated()
	{
		$a = new Money(1);

		$b = $a->negate();

		$this->assertEquals(-1, $b->getAmount());
	}

}
```

OK, para finalizarmos, vamos lançar o comando que executará o teste unitário, apontando um arquivo para o outro. (Obs.: certifique-se que voce está dentro da diretorio a /projetos/)
```
$ phpunit --bootstrap src/Money.php test/MoneyTest.php
```

Com tudo certo, teremos a saida:
```
PHPUnit 3.7.28 by Sebastian Bergmann.
.
Time: 23 ms, Memory: 2.75Mb
OK (1 test, 1 assertion)
```



