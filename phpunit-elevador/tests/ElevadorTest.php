<?php
use PHPUnit\Framework\TestCase;
use Exercicio\Elevador;

class ElevadorTest extends TestCase 
{
	public $elevador;

	public function setUp() : void 
	{
		$this->elevador = new Elevador(0,8);	
	}

	public function testAndarOrigem()
	{
		$andarOrigem = $this->elevador->getAndarOrigem();
		$this->assertNotNull($andarOrigem);
	}

	public function testAndarDestino()
	{
		$andarDestino = $this->elevador->getAndarDestino();
		$this->assertNotNull($andarDestino);
	}
}