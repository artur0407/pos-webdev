<?php
namespace Exercicio;

/** 
 * Class Edificio
 * Representa a construção que contem o elevador e os andares do prédio
 * @author Artur Pazeto Lopes <arturpztlopes@gmail.com> 
 * @access public 
 * @version 1.1.0
 * 
 * */
class Edificio 
{
    private $andares;
    private $andarAtual;
    private $andarDestino;
    private $pisosNotificados;
    private $pessoa;

    public function __construct() 
    {
        $this->andares = [0,1,2,3,4,5,6,7,8,9];
        $this->andarAtual = 0;
        $this->andarDestino;
        $this->pisosNotificados = [];
        $this->pessoa = new Pessoa();
    }

    /**
     * Chama o elevador notificando os pisos(andares) que ele passará
     *
     * @param [int] $andarAtual
     * @param [int] $andarDestino
     * @return int
     */
    public function chamarElevador($andarAtual, $andarDestino)
    {
        $elevador = new Elevador($andarAtual, $andarDestino);

        $this->andarAtual = $elevador->getAndarOrigem();
        $this->andarDestino = $elevador->getAndarDestino();

        $numAndares = $this->getAndaresNotificados();
        
        for($i=1; $i<count($this->andares); $i++) {
            $this->pisosNotificados[$i] = new Piso($i);
            $this->pessoa->setAndarAtual($i);
            if($i==$numAndares) break;
        }
        
        $numPisosNotificados = count($this->pisosNotificados);

        return $numPisosNotificados;
    }

    /**
     * Retorna numero de andares que devem ser notificados,
     * entre o andar de origem e o andar destino da pessoa
     *
     * @return int
     */
    public function getAndaresNotificados()
    {
        return $this->andarDestino - $this->andarAtual;
    }

    /**
     * Retorna conjunto de pisos que pelo qual o elevador passou
     *
     * @return array
     */
    public function getPisosNotificados()
    {
        return $this->pisosNotificados;
    }

    /**
     * Retorna conjunto de pisos que pelo qual o elevador passou
     *
     * @return Pessoa
     */
    public function getPessoa()
    {
        return $this->pessoa;
    }
}