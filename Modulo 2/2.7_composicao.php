<?php


// ==========================
// CLASSE MOTOR
// ==========================

class Motor
{

    private string $tipo;


    public function __construct(string $tipo)
    {
        $this->tipo = $tipo;
    }



    public function ligar()
    {
        echo "Motor {$this->tipo} ligado.";
    }

}



// ==========================
// CLASSE CARRO
// ==========================

class Carro
{

    private Motor $motor;



    public function __construct()
    {

        // COMPOSIÇÃO
        //
        // O Carro cria o seu próprio Motor.
        // O Motor pertence ao Carro.

        $this->motor = new Motor("Gasolina");

    }



    public function ligarCarro()
    {

        $this->motor->ligar();

    }

}



// ==========================
// EXECUÇÃO
// ==========================


$carro = new Carro();


$carro->ligarCarro();

?>