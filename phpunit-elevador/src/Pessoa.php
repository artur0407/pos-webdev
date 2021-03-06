<?php
namespace Exercicio;

/** 
 * Class Pessoa
 * Representa a pessoa que entratá no edificio e usará o elevador
 * @author Artur Pazeto Lopes <arturpztlopes@gmail.com> 
 * @access public 
 * @version 1.1.0
 * 
 * */
class Pessoa
{
    private $andarAtual;

    public function setAndarAtual($andarAtual)
    {
        $this->andarAtual = $andarAtual;
    }

    public function getAndarAtual()
    {
        return $this->andarAtual;
    }
}