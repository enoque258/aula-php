 <?php

/*
    ============================================================
    MEMBROS DE UMA CLASSE PHP (POO)
    ============================================================

    Uma classe é um molde usado para criar objetos.

    Dentro de uma classe podemos ter:

    1 - Constantes
    2 - Atributos (propriedades)
    3 - Construtor (__construct)
    4 - Métodos (funções da classe)
    5 - Destrutor (__destruct)
    6 - Modificadores de acesso:
        - public
        - private
        - protected

*/


class Funcionario
{

    /*
        ========================================================
        1 - CONSTANTE DA CLASSE
        ========================================================

        Uma constante é um valor que nunca muda.

        Diferente de uma variável, uma constante não pode
        receber outro valor depois de criada.

        Para acessar uma constante usamos:

        NomeDaClasse::NOME_DA_CONSTANTE

    */

    const EMPRESA = "Mechanical Tecnologia";



    /*
        ========================================================
        2 - ATRIBUTOS (PROPRIEDADES)
        ========================================================

        Atributos são características do objeto.

        Exemplo:

        Um funcionário possui:

        - nome
        - salário
        - cargo


        Os atributos guardam os dados do objeto.

    */


    // Atributo público
    // Pode ser acessado de qualquer lugar.
    public string $nome;



    // Atributo privado
    // Só pode ser usado dentro da própria classe.
    private float $salario;



    // Atributo protegido
    // Pode ser usado dentro da classe e pelas classes filhas.
    protected string $cargo;




    /*
        ========================================================
        3 - CONSTRUTOR (__construct)
        ========================================================

        O construtor é um método especial.

        Ele é executado automaticamente quando criamos
        um novo objeto usando "new".

        Serve para inicializar os valores dos atributos.

        Exemplo:

        $funcionario = new Funcionario(
            "Carlos",
            30000,
            "Programador"
        );

        Automaticamente o __construct é chamado.

    */


    public function __construct(
        string $nome,
        float $salario,
        string $cargo
    )
    {

        /*
            O $this representa o próprio objeto.

            Quando escrevemos:

            $this->nome = $nome;


            significa:

            "Guarde o valor recebido no atributo nome
             deste objeto."

        */


        $this->nome = $nome;

        $this->salario = $salario;

        $this->cargo = $cargo;

    }




    /*
        ========================================================
        4 - MÉTODOS DA CLASSE
        ========================================================

        Métodos são funções que pertencem à classe.

        Eles representam comportamentos ou ações
        que o objeto pode executar.

        Exemplos:

        - mostrar dados
        - calcular valores
        - salvar informações

    */


    // Método público
    // Pode ser chamado fora da classe.
    public function apresentar()
    {

        echo "Nome: " . $this->nome;

    }




    /*
        Este método permite acessar o salário.

        Como o salário é PRIVATE:

        private float $salario;


        não podemos fazer:

        $funcionario->salario;


        Então criamos um método público para
        entregar essa informação.

    */


    public function mostrarSalario()
    {

        echo "Salário: " . $this->salario;

    }




    /*
        Método para mostrar o cargo.

        O cargo é protected.

        Ele não pode ser acessado diretamente fora
        da classe.

    */

    public function mostrarCargo()
    {

        echo "Cargo: " . $this->cargo;

    }





    /*
        ========================================================
        5 - DESTRUTOR (__destruct)
        ========================================================

        O destrutor é executado automaticamente
        quando o objeto é destruído.

        Normalmente usado para:

        - fechar conexão com banco de dados
        - liberar memória
        - fechar arquivos

    */


    public function __destruct()
    {

        echo "<br>Objeto Funcionário destruído.";

    }


}





/*
    ============================================================
    CRIANDO UM OBJETO
    ============================================================

    Um objeto é uma instância de uma classe.

    Classe:
        Funcionário

    Objeto:
        $funcionario


    A classe é o molde.

    O objeto é algo criado usando esse molde.

*/


$funcionario = new Funcionario(

    "Carlos",

    35000,

    "Programador PHP"

);





/*
    ============================================================
    ACESSANDO UMA CONSTANTE
    ============================================================

    Para acessar uma constante usamos:

    Classe::Constante

*/

echo Funcionario::EMPRESA;

echo "<br><br>";





/*
    ============================================================
    CHAMANDO MÉTODOS DO OBJETO
    ============================================================

    Usamos:

    objeto->metodo()

*/

$funcionario->apresentar();

echo "<br>";

$funcionario->mostrarSalario();

echo "<br>";

$funcionario->mostrarCargo();





/*
    ============================================================
    ACESSANDO UM ATRIBUTO PÚBLICO
    ============================================================


    Como o nome é public:

    public string $nome;


    podemos alterar diretamente:


*/

$funcionario->nome = "João";


echo "<br><br>";

echo "Novo nome: " . $funcionario->nome;


/*
    ============================================================
    ERRO DE ACESSO

    Isto daria erro:

    echo $funcionario->salario;


    Porque salário é PRIVATE.


    Isto também daria erro:

    echo $funcionario->cargo;


    Porque cargo é PROTECTED.


    Para acessar esses dados usamos métodos
    públicos criados dentro da classe.

*/

?>
