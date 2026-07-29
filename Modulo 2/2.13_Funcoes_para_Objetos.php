 <?php


/*
============================================================
FUNÇÕES PARA OBJETOS EM PHP (MÉTODOS)
============================================================


Em Programação Orientada a Objetos:

Uma função dentro de uma classe chama-se MÉTODO.


Exemplo:

class Pessoa
{

    public function falar()
    {

    }

}


O método falar() pertence à classe Pessoa.


Quando criamos um objeto:

$pessoa = new Pessoa();


Podemos chamar o método:

$pessoa->falar();



Um objeto possui:

- Dados  -> atributos
- Ações  -> métodos


Exemplo:

Objeto Pessoa:

Dados:
    nome
    idade

Ações:
    falar()
    andar()
    estudar()


*/


class ContaBancaria
{


    /*
    ========================================================
    ATRIBUTOS DO OBJETO
    ========================================================

    São informações que pertencem ao objeto.

    Cada objeto terá os seus próprios valores.

    */


    public string $titular;

    private float $saldo;




    /*
    ========================================================
    CONSTRUTOR
    ========================================================

    O construtor inicializa os valores
    quando o objeto é criado.


    Exemplo:

    $conta = new ContaBancaria(
        "Carlos",
        5000
    );


    O PHP executa automaticamente:

    __construct()

    */


    public function __construct(
        string $titular,
        float $saldoInicial
    )
    {

        $this->titular = $titular;

        $this->saldo = $saldoInicial;

    }





    /*
    ========================================================
    MÉTODO SEM PARÂMETROS
    ========================================================

    Um método pode não receber nenhum valor.

    Ele simplesmente executa uma ação.


    */


    public function consultarSaldo()
    {

        echo "Saldo atual: " . $this->saldo . " MT";

    }





    /*
    ========================================================
    MÉTODO COM PARÂMETROS
    ========================================================

    Um método pode receber informações.

    Parâmetros são valores enviados para
    uma função executar uma tarefa.


    Exemplo:

    depositar(2000)


    O valor 2000 será recebido pelo parâmetro
    $valor.


    */


    public function depositar(float $valor)
    {


        /*
            Aqui estamos a alterar o saldo
            do próprio objeto.


            $this representa o objeto atual.


            Exemplo:


            $conta->depositar(1000);


            Internamente:

            $this->saldo += 1000;

        */


        $this->saldo += $valor;


        echo "Depósito realizado com sucesso.";

    }






    /*
    ========================================================
    MÉTODO COM RETORNO
    ========================================================

    Uma função pode devolver um valor usando:

    return


    Exemplo:

    calcularSaldo()


    retorna um número.


    */


    public function obterSaldo(): float
    {

        return $this->saldo;

    }






    /*
    ========================================================
    MÉTODO QUE CHAMA OUTRO MÉTODO
    ========================================================

    Um método pode utilizar outros métodos
    da própria classe.


    */


    public function mostrarInformacao()
    {


        echo "Titular: " . $this->titular;

        echo "<br>";

        echo "Saldo: " . $this->obterSaldo();


    }







    /*
    ========================================================
    MÉTODO STATIC
    ========================================================

    Um método static pertence à classe,
    não ao objeto.


    Não precisamos criar um objeto.


    Chamamos assim:


    ContaBancaria::informacao();


    */


    public static function informacao()
    {

        echo "Sistema bancário PHP";

    }



}






/*
============================================================
CRIANDO OBJETOS
============================================================


Criamos objetos usando:

new


Cada objeto possui os seus próprios dados.


*/


$conta1 = new ContaBancaria(
    "Carlos",
    5000
);



$conta2 = new ContaBancaria(
    "Maria",
    8000
);







/*
============================================================
CHAMANDO MÉTODOS DO OBJETO
============================================================


A sintaxe é:


$objeto->metodo();


*/


echo "<h3>Conta 1</h3>";


$conta1->consultarSaldo();


echo "<br><br>";



/*
Chamando método com parâmetro.

Enviamos 2000 para o método depositar()

*/


$conta1->depositar(2000);


echo "<br>";



$conta1->consultarSaldo();





echo "<hr>";





echo "<h3>Conta 2</h3>";


$conta2->mostrarInformacao();







/*
============================================================
USANDO RETURN
============================================================


Quando um método retorna um valor,
podemos guardar esse resultado numa variável.


*/


$saldo = $conta1->obterSaldo();



echo "<br><br>";

echo "Valor guardado na variável: " . $saldo;







/*
============================================================
CHAMANDO MÉTODO STATIC
============================================================


Métodos static são chamados usando:


Classe::metodo();


Não usamos:


$objeto->metodo();


*/


echo "<br><br>";

ContaBancaria::informacao();





?>
