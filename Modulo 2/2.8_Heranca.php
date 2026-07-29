 <?php

/*
=====================================================
        HERANÇA EM PHP - PROGRAMAÇÃO ORIENTADA A OBJETOS
=====================================================

O QUE É HERANÇA?

Herança é um mecanismo da POO onde uma classe
pode receber características de outra classe.

A classe que fornece os atributos e métodos
é chamada de:

- Classe Pai
- Classe Base
- Superclasse


A classe que recebe é chamada de:

- Classe Filha
- Subclasse


Exemplo:

                 Conta (Classe Pai)
                      |
          ---------------------------
          |                         |
 ContaPoupanca               ContaCorrente
 (Classe Filha)              (Classe Filha)


A ideia é evitar repetição de código.

As duas classes filhas precisam de:

- agencia
- conta
- saldo
- depositar()
- getSaldo()


Então colocamos tudo na classe Conta.


=====================================================
*/


// =====================================================
// CLASSE PAI
// =====================================================


class Conta
{

    /*
    protected significa:

    - A própria classe pode acessar
    - As classes filhas também podem acessar

    Diferente de private, que só a própria classe acessa.
    */


    protected string $agencia;

    protected string $numeroConta;

    protected float $saldo;



    /*
    CONSTRUTOR DA CLASSE PAI

    Ele recebe os dados comuns
    de todas as contas.

    */

    public function __construct(
        string $agencia,
        string $numeroConta
    )
    {

        $this->agencia = $agencia;

        $this->numeroConta = $numeroConta;


        // Toda conta começa com saldo zero

        $this->saldo = 0;

    }



    /*
    Método comum para todas as contas

    As classes filhas vão herdar
    automaticamente este método.
    */


    public function depositar(
        float $valor
    ): void
    {

        $this->saldo += $valor;

    }



    /*
    Retorna o saldo atual
    */


    public function getSaldo(): float
    {

        return $this->saldo;

    }


}



// =====================================================
// CLASSE FILHA - CONTA POUPANÇA
// =====================================================


/*

extends significa HERDAR.

Aqui estamos dizendo:

ContaPoupanca É UMA Conta.


Ela recebe automaticamente:

- agencia
- numeroConta
- saldo
- depositar()
- getSaldo()

*/


class ContaPoupanca extends Conta
{


    /*
    Método exclusivo da conta poupança.

    A conta poupança só permite retirar
    se existir saldo suficiente.
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




// =====================================================
// CLASSE FILHA - CONTA CORRENTE
// =====================================================


class ContaCorrente extends Conta
{


    /*
    A conta corrente possui algo
    que a conta normal não possui:

    LIMITE

    */


    private float $limite;



    /*
    Aqui temos outro construtor.

    Como a classe filha possui uma
    propriedade nova ($limite),
    precisamos criar um construtor próprio.

    */


    public function __construct(
        string $agencia,
        string $numeroConta,
        float $limite
    )
    {


        /*
        parent significa chamar
        a classe pai.

        Aqui estamos dizendo:

        "Execute o construtor da classe Conta"

        */

        parent::__construct(
            $agencia,
            $numeroConta
        );



        // Depois adicionamos o limite

        $this->limite = $limite;

    }




    /*
    Método retirar da conta corrente.

    A regra é diferente da poupança.

    Pode retirar usando:

    saldo + limite
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




// =====================================================
// EXECUÇÃO DO PROGRAMA
// =====================================================



echo "<h2>Conta Poupança</h2>";



// Criando uma conta poupança

$poupanca = new ContaPoupanca(
    "001",
    "12345"
);



// Depositando dinheiro

$poupanca->depositar(1000);



// Retirando dinheiro

if($poupanca->retirar(300))
{

    echo "Retirada realizada<br>";

}
else
{

    echo "Saldo insuficiente<br>";

}



echo "Saldo atual: ";

echo $poupanca->getSaldo();






echo "<hr>";





echo "<h2>Conta Corrente</h2>";



// Criando conta corrente

$corrente = new ContaCorrente(
    "002",
    "99999",
    500
);



// Depositando

$corrente->depositar(1000);



// Retirando usando limite

if($corrente->retirar(1200))
{

    echo "Retirada realizada<br>";

}
else
{

    echo "Saldo insuficiente<br>";

}



echo "Saldo atual: ";

echo $corrente->getSaldo();





/*
=====================================================

RESULTADO ESPERADO:


Conta Poupança

Retirada realizada
Saldo atual: 700


Conta Corrente

Retirada realizada
Saldo atual: -200



=====================================================


O QUE APRENDEMOS:


1) HERANÇA

Uma classe aproveita código de outra.

Exemplo:

class ContaCorrente extends Conta



2) extends

Indica que uma classe herda outra.


3) protected

Permite que classes filhas acessem
atributos da classe pai.


4) parent::__construct()

Chama o construtor da classe pai.


5) Reutilização

Sem herança teríamos:


ContaPoupanca:

- agencia
- conta
- saldo
- depositar()
- getSaldo()


ContaCorrente:

- agencia
- conta
- saldo
- depositar()
- getSaldo()



Código repetido.


Com herança:


Conta

     |
     |
 ----------------
 |              |
Poupança     Corrente



Código organizado.


=====================================================
*/

?>
