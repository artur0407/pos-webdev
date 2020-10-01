<?php
use PHPUnit\Framework\TestCase;
use src\Edificio;

class PessoaTest extends TestCase 
{
    public $edificio;
    public $pessoa;

	public function setUp() : void 
	{
        $this->edificio = new Edificio();
        $this->edificio->chamarElevador(0,8);
        $this->pessoa = $this->edificio->getPessoa();
	}

	public function testGetAndarAtual()
	{
		$this->assertNotNull($this->pessoa->getAndarAtual());
	}
}