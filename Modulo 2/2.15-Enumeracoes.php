<?php

/*
============================================================
ENUMERAÇÕES (ENUM) EM PHP - POO
============================================================

O que é uma ENUMERAÇÃO?
Uma enumeração (enum) é um tipo especial de classeque representa um conjunto fixo de valores possíveis.
Ela serve para limitar os valores que uma variável pode receber.

Exemplo: Um funcionário pode ter apenas estes estados:
- ATIVO
- FERIAS
- DESLIGADO

Em vez de escrever:
$status = "ativo";
$status = "ferias";
$status = "qualquer_coisa";

Criamos uma ENUM que controla os valores.
ENUM evita erros e deixa o código mais seguro.

============================================================
Antes do PHP 8.1:
Era comum fazer assim:
*/
$status = "ATIVO";

/*
Problema: Nada impede alguém de fazer:
*/
$status = "QUALQUER_VALOR";

/*
O PHP aceita porque é apenas uma string.
Com ENUM podemos controlar.

============================================================
CRIANDO UMA ENUM
============================================================

Sintaxe:

enum NomeEnum
{

    case VALOR;

}


*/


enum StatusFuncionario
{

    /*
        Cada case representa uma opção permitida.

        Esta enumeração só aceita:

        ATIVO
        FERIAS
        DESLIGADO

    */


    case ATIVO;

    case FERIAS;

    case DESLIGADO;

}





/*
============================================================
USANDO UMA ENUM
============================================================


Agora uma variável do tipo StatusFuncionario
só pode receber os valores existentes.


*/


$status = StatusFuncionario::ATIVO;


echo $status->name;



/*
Resultado:

ATIVO


O atributo:

name

retorna o nome do case.


============================================================
*/


echo "<br><br>";



/*
============================================================
ENUM COM CLASSE E OBJETOS
============================================================


Vamos criar uma classe Funcionário
usando uma enum.


*/


class Funcionario
{

    public string $nome;


    /*
        Aqui o atributo recebe apenas
        valores da enum StatusFuncionario.


        Não aceita qualquer texto.

    */

    public StatusFuncionario $status;



    public function __construct(
        string $nome,
        StatusFuncionario $status
    )
    {

        $this->nome = $nome;

        $this->status = $status;

    }



    public function mostrarDados()
    {

        echo "Nome: " . $this->nome;

        echo "<br>";

        echo "Estado: " . $this->status->name;

    }

}





/*
============================================================
CRIANDO OBJETOS
============================================================


Criamos funcionário passando
um valor válido da enum.


*/


$funcionario1 = new Funcionario(
    "Carlos",
    StatusFuncionario::ATIVO
);


$funcionario1->mostrarDados();



echo "<hr>";



$funcionario2 = new Funcionario(
    "Maria",
    StatusFuncionario::FERIAS
);


$funcionario2->mostrarDados();





/*
============================================================
O QUE A ENUM EVITA?
============================================================


Sem enum:

*/


class UsuarioSemEnum
{

    public string $nivel;

}


$usuario = new UsuarioSemEnum();


$usuario->nivel = "Administrador";



/*
O problema:

Qualquer valor é aceito:

*/


$usuario->nivel = "ABC123";



/*
============================================================
COM ENUM FICA CONTROLADO
============================================================

*/


enum NivelAcesso
{

    case ADMIN;

    case GERENTE;

    case USUARIO;

}



class Usuario
{

    public string $nome;

    public NivelAcesso $nivel;



    public function __construct(
        string $nome,
        NivelAcesso $nivel
    )
    {

        $this->nome = $nome;

        $this->nivel = $nivel;

    }


}



$usuario1 = new Usuario(
    "João",
    NivelAcesso::ADMIN
);



/*
Isto funciona:

NivelAcesso::ADMIN


Mas isto daria erro:


"ADMIN"


Porque a classe espera
um valor da enum.


*/




/*
============================================================
ENUM COM VALORES (BACKED ENUM)
============================================================


Uma enum também pode possuir valores.


Existem dois tipos:

1 - Enum simples

case ATIVO;


2 - Enum com valor


case ATIVO = "ativo";


Para isso usamos:

string
ou
int


*/


enum StatusPagamento:string
{

    case PENDENTE = "pendente";

    case PAGO = "pago";

    case CANCELADO = "cancelado";

}





/*
Agora podemos acessar:

value


*/


echo "<br>";

echo StatusPagamento::PAGO->value;



/*
Resultado:

pago


============================================================
ENUM COM MÉTODOS
============================================================


Como enum é uma estrutura parecida
com uma classe, ela também pode ter métodos.


*/


enum TipoUsuario
{

    case ADMIN;

    case CLIENTE;



    public function descricao()
    {

        return match($this)
        {

            self::ADMIN => "Administrador do sistema",

            self::CLIENTE => "Cliente comum"

        };

    }


}





echo "<br><br>";



echo TipoUsuario::ADMIN->descricao();



/*
============================================================
RESUMO ENUM PHP
============================================================


ENUM:

- Representa valores fixos.
- Evita valores inválidos.
- Melhora a organização do código.
- Funciona muito bem com POO.
- Pode possuir métodos.
- Pode possuir valores.


Exemplo prático:


Sistema de vendas:

enum EstadoPedido
{

    case CRIADO;

    case PAGO;

    case ENVIADO;

    case ENTREGUE;

}


Sistema bancário:

enum TipoConta
{

    case CORRENTE;

    case POUPANCA;

}


Sistema de usuários:

enum Permissao
{

    case ADMIN;

    case FUNCIONARIO;

    case CLIENTE;

}



============================================================

ENUM é muito usado em sistemas profissionais:

- Laravel
- Symfony
- APIs REST
- Sistemas financeiros
- Sistemas ERP


============================================================

*/
?>