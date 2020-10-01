<?php
use PHPUnit\Framework\TestCase;
use src\Edificio;

class EdificioTest extends TestCase 
{
	public $edificio;
	public $pisosNotificados;
	public $andaresNotificados;

	public function setUp() : void 
	{
		$this->edificio = new Edificio();
		$this->pisosNotificados = $this->edificio->chamarElevador(0,8);
		$this->andaresNotificados = $this->edificio->getAndaresNotificados();
	}

	public function testGetAndaresNotificados()
	{
		$this->assertNotNull($this->andaresNotificados);
	}

	public function testChamarElevador()
	{
		$this->assertEquals($this->pisosNotificados, $this->andaresNotificados);
	}

	public function testGetPisosNotificados()
	{
		$this->assertNotEmpty($this->pisosNotificados);
	}
}