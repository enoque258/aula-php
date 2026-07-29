<?

//3) COMPOSIÇÃO
//Exemplo: Casa e Quarto Ideia: A Casa cria os quartos.O quarto depende da casa.
// CLASSE QUARTO
class Quarto{
   
    private string $nome;
    public function __construct(string $nome){
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
}

// CLASSE CASA
class Casa{
    private array $quartos = [];

    public function __construct() {
        // A própria Casa cria os quartos
        $this->quartos[] = new Quarto("Quarto Principal");
        $this->quartos[] = new Quarto("Quarto de Visitas");
    }

    public function mostrarQuartos() {
        echo "Quartos da casa:<br>";

        foreach($this->quartos as $quarto){
            echo "- ". $quarto->getNome() . "<br>";
        }

    }

}

// EXECUÇÃO
$casa = new Casa();
$casa->mostrarQuartos();

?>
