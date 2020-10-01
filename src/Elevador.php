<?php

/** 
 * Class Elevador
 * Responsável por retornar o andar inicial e andar final após acionado
 * @author Artur Pazeto Lopes <arturpztlopes@gmail.com> 
 * @access public 
 * @version 1.0.2
 * 
 * */
namespace src;

class Elevador 
{
	private $andarOrigem;
    private $andarDestino;
    
    public function __construct($andarOrigem, $andarDestino)
    {
        $this->setAndarOrigem($andarOrigem);
        $this->setAndarDestino($andarDestino);
    }

    public function setAndarOrigem($andarOrigem) 
    {
        $this->andarOrigem = $andarOrigem;
    }

    public function getAndarOrigem() 
    {
		    return $this->andarOrigem;
    }
    
    public function setAndarDestino($andarDestino) 
    {
		    $this->andarDestino = $andarDestino;
	  }

    public function getAndarDestino() 
    {
		    return $this->andarDestino;
	  }
}