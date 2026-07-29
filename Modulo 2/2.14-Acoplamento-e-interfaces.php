<?php

/*
============================================================
ACOPLAMENTO E INTERFACE EM PHP (POO)
============================================================

ACOPLAMENTO:

Acoplamento é o nível de dependência que uma classe
tem de outra classe.

Quando uma classe conhece diretamente outra classe,
temos um acoplamento forte (alto acoplamento).

Problemas do alto acoplamento:

- Dificulta alterar o código.
- Dificulta reutilizar classes.
- Dificulta fazer testes.
- Cria dependências desnecessárias.


Exemplo:

Uma classe Pedido depende diretamente da classe MySQL.

Pedido ---> MySQL


Se amanhã quisermos trocar MySQL por PostgreSQL,
teremos que modificar a classe Pedido.


O objetivo da POO moderna é:

BAIXO ACOPLAMENTO

Ou seja:

As classes devem depender de contratos
(interface), e não de classes específicas.

============================================================
*/


/*
============================================================
EXEMPLO DE ALTO ACOPLAMENTO (FORMA ERRADA)
============================================================

Aqui a classe Pedido está presa ao MySQL.

Ela cria diretamente o objeto MySQL.

*/

class MySQL
{

    public function conectar()
    {
        echo "Conectado ao banco MySQL";
    }

}


class PedidoErrado
{

    private MySQL $banco;


    public function __construct()
    {

        /*
            PROBLEMA:

            Estamos criando diretamente MySQL.

            Agora PedidoErrado só funciona com MySQL.

            Não conseguimos trocar para:

            PostgreSQL
            SQLite
            Oracle

            sem alterar esta classe.

        */

        $this->banco = new MySQL();

    }


    public function salvar()
    {

        $this->banco->conectar();

        echo "<br>Pedido salvo.";

    }

}


/*
Uso:

*/

$pedido = new PedidoErrado();

$pedido->salvar();



echo "<hr>";



/*
============================================================
SOLUÇÃO: INTERFACE
============================================================


INTERFACE:

Uma interface é um contrato.

Ela define quais métodos uma classe
é obrigada a possuir.


Ela não diz COMO fazer.

Ela apenas diz:

"Qualquer classe que implementar esta interface
deve possuir este método."


Sintaxe:

interface NomeInterface
{

    public function metodo();

}


Para usar uma interface usamos:

implements


Exemplo:

class MySQL implements BancoDados

*/


interface BancoDados
{

    /*
        Este método é obrigatório.

        Qualquer classe que usar esta interface
        terá que criar o método conectar().

    */

    public function conectar();

}



/*
============================================================
IMPLEMENTAÇÃO MYSQL
============================================================

A classe MySQL agora segue o contrato BancoDados.

Ela é obrigada a criar:

conectar()

*/


class MySQLNovo implements BancoDados
{

    public function conectar()
    {

        echo "Conectado ao banco MySQL";

    }

}



/*
============================================================
IMPLEMENTAÇÃO POSTGRESQL
============================================================

Outra classe pode seguir o mesmo contrato.

Agora podemos adicionar outro banco
sem alterar a classe Pedido.

*/


class PostgreSQL implements BancoDados
{

    public function conectar()
    {

        echo "Conectado ao banco PostgreSQL";

    }

}



/*
============================================================
CLASSE PEDIDO COM BAIXO ACOPLAMENTO
============================================================


Agora Pedido não conhece:

MySQL
PostgreSQL


Ela conhece apenas:

BancoDados


Ou seja:

Pedido depende de uma interface.


Esta é uma das grandes práticas
da Programação Orientada a Objetos.


*/


class Pedido
{

    private BancoDados $banco;


    public function __construct(
        BancoDados $banco
    )
    {

        /*
            Recebemos um objeto que segue
            o contrato BancoDados.


            Pode ser:

            MySQLNovo
            PostgreSQL


            A classe Pedido não precisa saber
            qual banco está sendo usado.

        */


        $this->banco = $banco;

    }


    public function salvar()
    {

        /*
            Chamamos o método conectar.

            Como qualquer classe que implementa
            BancoDados possui este método,
            o código funciona.

        */


        $this->banco->conectar();

        echo "<br>Pedido guardado com sucesso.";

    }

}



/*
============================================================
CRIANDO OBJETOS
============================================================


Primeiro usamos MySQL.

*/


$mysql = new MySQLNovo();


$pedidoMysql = new Pedido($mysql);


$pedidoMysql->salvar();



echo "<br><br>";



/*
Agora podemos trocar para PostgreSQL.


A classe Pedido continua exatamente igual.


Não precisamos alterar nada nela.

*/


$postgres = new PostgreSQL();


$pedidoPostgres = new Pedido($postgres);


$pedidoPostgres->salvar();



/*
============================================================
RESULTADO DA ARQUITETURA
============================================================


Antes:

Pedido
 |
 |
 v
MySQL


Alto acoplamento.


Depois:


              BancoDados
                  |
        ---------------------
        |                   |
     MySQLNovo        PostgreSQL
        |
        |
      Pedido


Baixo acoplamento.


============================================================


CONCEITOS IMPORTANTES:

1 - Interface

É um contrato que define métodos obrigatórios.


2 - implements

Usado quando uma classe aceita seguir
uma interface.


3 - Injeção de dependência

Quando uma classe recebe uma dependência
pelo construtor.


Exemplo:

public function __construct(BancoDados $banco)


A classe recebe o banco pronto,
em vez de criar.


4 - Baixo acoplamento

Classes independentes e fáceis de alterar.


============================================================

REGRA IMPORTANTE DA POO:

"Dependa de abstrações,
não de implementações."


Errado:

$this->banco = new MySQL();


Certo:

public function __construct(BancoDados $banco)
{
    $this->banco = $banco;
}


============================================================

*/
?>