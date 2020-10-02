<?php
namespace Exercicio;

/** 
 * Class Piso
 * Andar do predio onde o elevador pode ou não estar
 * @author Artur Pazeto Lopes <arturpztlopes@gmail.com> 
 * @access public 
 * @version 1.1.0
 * 
 * */
class Piso 
{
    private $posicaoElevador;

    public function __construct($andarAtual) 
    {
        $this->posicaoElevador = $andarAtual;
    }

    /**
     * Retorna a posicao que o elevador se encontra neste piso(andar)
     *
     * @return int
     */
    public function getPositionElevador()
    {
        return $this->posicaoElevador;
    }
}