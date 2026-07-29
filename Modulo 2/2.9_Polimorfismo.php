 <?php


/*
====================================================

              POLIMORFISMO EM PHP

====================================================


Polimorfismo significa:

"Um mesmo método pode ter várias formas
de funcionamento."


Exemplo:

ContaPoupanca e ContaCorrente
possuem o método:

retirar()


Porém cada uma possui uma regra diferente.


ContaPoupanca:

- Não pode retirar além do saldo.


ContaCorrente:

- Pode usar o limite.


====================================================
*/



// ===================================================
// CLASSE PAI
// ===================================================


abstract class Conta
{


    protected string $agencia;

    protected string $conta;

    protected float $saldo;



    public function __construct(
        string $agencia,
        string $conta
    )
    {

        $this->agencia = $agencia;

        $this->conta = $conta;

        $this->saldo = 0;

    }




    public function depositar(
        float $valor
    ): void
    {

        $this->saldo += $valor;

    }




    public function getSaldo(): float
    {

        return $this->saldo;

    }



    /*
    
    MÉTODO ABSTRATO

    Aqui está uma parte importante do polimorfismo.


    A classe pai diz:

    "Toda conta deve possuir retirar()"


    Mas ela não sabe como será feito.


    Cada filha será responsável pela implementação.


    */


    abstract public function retirar(
        float $valor
    ): bool;



}





// ===================================================
// CLASSE FILHA
// CONTA POUPANÇA
// ===================================================


class ContaPoupanca extends Conta
{


    /*
    
    Aqui estamos sobrescrevendo o método retirar()


    A ContaPoupanca possui uma regra própria.


    */


    public function retirar(
        float $valor
    ): bool
    {


        if($valor <= $this->saldo)
        {


            $this->saldo -= $valor;


            return true;

        }



        return false;


    }


}





// ===================================================
// CLASSE FILHA
// CONTA CORRENTE
// ===================================================


class ContaCorrente extends Conta
{


    private float $limite;




    public function __construct(
        string $agencia,
        string $conta,
        float $limite
    )
    {


        parent::__construct(
            $agencia,
            $conta
        );


        $this->limite = $limite;


    }





    /*
    
    Mesmo método:

    retirar()


    Mas outro comportamento.


    */


    public function retirar(
        float $valor
    ): bool
    {


        if(
            $valor <= 
            ($this->saldo + $this->limite)
        )
        {


            $this->saldo -= $valor;


            return true;


        }



        return false;


    }



}





// ===================================================
// TESTANDO O POLIMORFISMO
// ===================================================



/*

Criamos uma conta poupança

*/


$poupanca = new ContaPoupanca(
    "001",
    "111"
);



$poupanca->depositar(1000);





/*

Criamos uma conta corrente

*/


$corrente = new ContaCorrente(
    "002",
    "222",
    500
);



$corrente->depositar(1000);







/*

Agora vem a parte principal:

POLIMORFISMO


Criamos um vetor de contas.


Observe:

O tipo é Conta.


Mas dentro temos:

ContaPoupanca

ContaCorrente


Ambas são contas.


*/


$contas = [

    $poupanca,

    $corrente

];





/*

Agora percorremos todas.


O PHP vai chamar automaticamente
o método correto de cada objeto.


*/


foreach($contas as $conta)
{


    if($conta->retirar(1200))
    {

        echo "Retirada realizada<br>";

    }
    else
    {

        echo "Não foi possível retirar<br>";

    }


    echo "Saldo: ";

    echo $conta->getSaldo();

    echo "<hr>";


}




?>
