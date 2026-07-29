 <?php


/*
====================================================

             ABSTRAÇÃO EM PHP - POO

====================================================


Abstração significa:

Criar uma classe modelo que representa
uma ideia geral.

Ela define regras que as classes filhas
devem seguir.


Exemplo:


              Conta (abstrata)

                    |
        -------------------------
        |                       |

ContaPoupanca          ContaCorrente



A classe Conta não representa uma conta real.

Ela apenas define o que todas as contas
devem possuir.


====================================================
*/



// ==================================================
// CLASSE ABSTRATA (CLASSE MODELO)
// ==================================================


abstract class Conta
{


    protected string $agencia;

    protected string $numero;

    protected float $saldo;




    public function __construct(
        string $agencia,
        string $numero
    )
    {

        $this->agencia = $agencia;

        $this->numero = $numero;

        $this->saldo = 0;

    }





    /*
    
    Método normal.

    Todas as contas recebem dinheiro
    da mesma forma.


    */


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


    Ele não possui código.


    Ele apenas obriga as classes filhas
    a criarem sua própria versão.


    */


    abstract public function retirar(
        float $valor
    ): bool;



}






// ==================================================
// CLASSE FILHA
// CONTA POUPANÇA
// ==================================================


class ContaPoupanca extends Conta
{


    /*
    
    Aqui somos obrigados a implementar
    o método retirar()


    Porque a classe pai exigiu.


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







// ==================================================
// CLASSE FILHA
// CONTA CORRENTE
// ==================================================


class ContaCorrente extends Conta
{


    private float $limite;




    public function __construct(
        string $agencia,
        string $numero,
        float $limite
    )
    {


        parent::__construct(
            $agencia,
            $numero
        );


        $this->limite = $limite;

    }





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







// ==================================================
// EXECUÇÃO
// ==================================================




/*

Não podemos fazer:

$conta = new Conta();


Porque Conta é abstrata.


*/


// Criamos uma conta real:

$poupanca = new ContaPoupanca(
    "001",
    "12345"
);



$poupanca->depositar(1000);



if($poupanca->retirar(300))
{

    echo "Retirada realizada<br>";

}
else
{

    echo "Não foi possível retirar<br>";

}



echo "Saldo poupança: ";

echo $poupanca->getSaldo();




echo "<hr>";





$corrente = new ContaCorrente(
    "002",
    "99999",
    500
);



$corrente->depositar(1000);



$corrente->retirar(1200);



echo "Saldo corrente: ";

echo $corrente->getSaldo();





/*
====================================================


O QUE APRENDEMOS?


1) CLASSE ABSTRATA


abstract class Conta


É uma classe modelo.

Não pode criar objetos diretamente.


Errado:

new Conta();



2) MÉTODO ABSTRATO


abstract public function retirar();



Obriga as classes filhas a implementarem.


3) HERANÇA


class ContaCorrente extends Conta



A classe filha recebe características
da classe pai.


4) POLIMORFISMO


O método:

retirar()


existe em várias classes,
mas cada uma possui comportamento diferente.


====================================================

*/
?>
