<?php


// Classe Professor

class Professor
{

    private string $nome;


    public function __construct(string $nome)
    {
        $this->nome = $nome;
    }


    public function getNome()
    {
        return $this->nome;
    }

}



// Classe Curso

class Curso
{

    private string $nome;


    // O ? permite Professor ou null
    private ?Professor $professor;



    public function __construct(
        string $nome,
        ?Professor $professor
    )
    {
        $this->nome = $nome;
        $this->professor = $professor;
    }



    public function getProfessor()
    {
        return $this->professor;
    }

}




// ===============================
// TESTE 1
// Curso com professor
// ===============================


$professor = new Professor("Carlos");


$curso1 = new Curso(
    "PHP Orientado a Objetos",
    $professor
);



echo $curso1->getProfessor()?->getNome();


echo "<br>";




// ===============================
// TESTE 2
// Curso sem professor
// ===============================


$curso2 = new Curso(
    "JavaScript",
    null
);



echo $curso2->getProfessor()?->getNome();


?>