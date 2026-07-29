<?

//1) ASSOCIAÇÃO- Exemplo: Professor e Curso
//Ideia: Um Curso possui um Professor, mas ambos podem existir separados.
// CLASSE PROFESSOR
class Professor{
    // Propriedade privada
    private string $nome;
    public function __construct(string $nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
}
=
// CLASSE CURSO
class Curso{
    private string $nome;
    // Aqui estamos criando uma relação entre Curso e Professor
    // Curso possui um objeto Professor
    private Professor $professor;

    public function __construct(string $nome,Professor $professor){
        $this->nome = $nome;
        // Recebe um objeto Professor
        $this->professor = $professor;
    }

    public function mostrarCurso(){
        echo "Curso: " . $this->nome . "<br>";
        echo "Professor: ". $this->professor->getNome();
    }
}


// EXECUÇÃO
// Criamos um professor independente
$professor = new Professor("Carlos");

// Passamos o professor para o curso
$curso = new Curso(
    "Programação PHP",
    $professor
);

// Mostrar informações
$curso->mostrarCurso();

?>