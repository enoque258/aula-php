<?php

/*
============================================================
DESIGN PATTERNS (PADRÕES DE PROJETO) EM PHP
============================================================

O que são Design Patterns?

Design Patterns são soluções reutilizáveis para
problemas comuns de programação.

Eles não são bibliotecas nem códigos prontos.

São "modelos" ou "formas corretas" de organizar
classes e objetos.


Exemplo:

Problema:

Vários lugares do sistema precisam criar objetos
de uma mesma classe.


Solução:

Usar um padrão de projeto que organize essa criação.


============================================================

POR QUE USAR DESIGN PATTERNS?

Sem padrões:

- Código repetido.
- Classes muito dependentes.
- Difícil manutenção.
- Dificuldade para crescer o sistema.


Com padrões:

- Código organizado.
- Baixo acoplamento.
- Fácil manutenção.
- Melhor reutilização.


============================================================

TIPOS DE DESIGN PATTERNS

Existem 3 grandes grupos:


1 - CRIACIONAIS (Creational)

Responsáveis pela criação de objetos.

Exemplos:

- Singleton
- Factory
- Abstract Factory
- Builder


2 - ESTRUTURAIS (Structural)

Organizam relações entre classes.

Exemplos:

- Adapter
- Decorator
- Facade


3 - COMPORTAMENTAIS (Behavioral)

Organizam comunicação entre objetos.

Exemplos:

- Observer
- Strategy
- Command



Neste exemplo vamos estudar:

SINGLETON

============================================================
*/


/*
============================================================
PADRÃO SINGLETON
============================================================


O que é Singleton?

Singleton garante que uma classe tenha
apenas UMA instância durante toda a aplicação.


Exemplo real:

Conexão com banco de dados.


Não queremos criar:

$conexao1
$conexao2
$conexao3


Queremos uma única conexão.


Banco de dados:

Aplicação
    |
    |
    v
Única conexão


============================================================

*/


class Database
{

    /*
        Guardamos a única instância
        da classe.

        static significa que pertence
        à classe e não ao objeto.

    */

    private static ?Database $instance = null;



    /*
        O construtor é privado.

        Isso impede alguém de fazer:


        new Database();


        A criação será controlada pela própria classe.

    */


    private function __construct()
    {

        echo "Conexão criada.";

    }



    /*
        Método responsável por entregar
        a única instância.

    */


    public static function getInstance(): Database
    {

        /*
            Verifica:

            Já existe uma conexão?


            Se não existir:

            cria uma.


        */


        if(self::$instance === null)
        {

            self::$instance = new Database();

        }



        /*
            Retorna sempre a mesma instância.

        */


        return self::$instance;

    }



    public function consultar()
    {

        echo "<br>Executando consulta no banco.";

    }


}





/*
============================================================
USANDO O SINGLETON
============================================================


Primeira chamada:

A classe cria o objeto.


*/


$db1 = Database::getInstance();


$db1->consultar();



echo "<br>";



/*
Segunda chamada:

A classe não cria outro objeto.

Ela devolve o mesmo.


*/


$db2 = Database::getInstance();


$db2->consultar();





/*
============================================================
COMPARANDO OS OBJETOS
============================================================


Vamos verificar se são iguais.


*/


if($db1 === $db2)
{

    echo "<br><br>";

    echo "É a mesma conexão.";

}
else
{

    echo "São conexões diferentes.";

}



/*
============================================================
RESULTADO:

Conexão criada.

Executando consulta no banco.

Executando consulta no banco.

É a mesma conexão.



O objeto foi criado apenas uma vez.


============================================================
*/





/*
============================================================
OUTRO DESIGN PATTERN MUITO USADO:
FACTORY
============================================================


Factory significa "fábrica".

Serve para criar objetos
sem deixar o código depender
diretamente das classes.


Exemplo:


Sistema de pagamentos:


Cartão
Pix
Transferência



Em vez de:


new Cartao();

new Pix();


Criamos uma fábrica.


*/


interface Pagamento
{

    public function pagar(float $valor);

}




class Cartao implements Pagamento
{

    public function pagar(float $valor)
    {

        echo "Pagamento de $valor MT usando cartão.";

    }

}

class Pix implements Pagamento
{

    public function pagar(float $valor)
    {

        echo "Pagamento de $valor MT usando Pix.";

    }

}





class PagamentoFactory
{


    public static function criar(
        string $tipo
    ): Pagamento
    {


        /*
            A fábrica decide qual objeto criar.


        */


        return match($tipo)
        {

            "cartao" => new Cartao(),

            "pix" => new Pix(),


            default => throw new Exception(
                "Tipo de pagamento inválido"
            )

        };


    }


}






/*
============================================================
USANDO FACTORY
============================================================


Agora não precisamos criar diretamente:

new Cartao();

new Pix();


A fábrica faz isso.


*/


$pagamento = PagamentoFactory::criar("pix");


$pagamento->pagar(500);



/*
============================================================
VANTAGENS:

Antes:

Código depende das classes:


Sistema ---> Cartao


Depois:


Sistema ---> Factory ---> Cartao


Se amanhã aparecer:

Mpesa
Emola
PayPal


alteramos apenas a fábrica.


============================================================
*/





/*
============================================================
RESUMO DOS DESIGN PATTERNS
============================================================


Singleton:

- Uma única instância.
- Muito usado em conexões, configurações.


Factory:

- Centraliza criação de objetos.
- Reduz dependências.


Strategy:

- Troca algoritmos facilmente.


Observer:

- Um objeto avisa outros quando algo acontece.


Adapter:

- Faz classes incompatíveis trabalharem juntas.


Facade:

- Cria uma interface simples para sistemas complexos.



============================================================


RELAÇÃO COM OS PRINCÍPIOS SOLID:

Design Patterns normalmente trabalham junto
com SOLID.


Exemplo:

Single Responsibility:
Uma classe deve ter uma responsabilidade.


Open/Closed:
Código deve aceitar novas funcionalidades
sem modificar o existente.


Dependency Inversion:
Depender de interfaces,
não de classes concretas.



============================================================

*/
?>