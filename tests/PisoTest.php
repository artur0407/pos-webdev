<?php
use PHPUnit\Framework\TestCase;
use src\Edificio;

class PisoTest extends TestCase 
{
	public $edificio;
	public $pisosNotificados;
	public $andaresNotificados;

	public function setUp() : void 
	{
		$this->edificio = new Edificio();
		$this->pisosNotificados = $this->edificio->chamarElevador(0,8);
	}
    
	public function testGetPositionElevador()
	{
		$numPisosNotificados = 0;

		$arrayPisos = $this->edificio->getPisosNotificados();

		foreach($arrayPisos as $piso) {
			if($piso->getPositionElevador() > 0) {
				$numPisosNotificados += 1;
			}
		}

		$this->assertCount($numPisosNotificados, $this->edificio->getPisosNotificados());
	}
}