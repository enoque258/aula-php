<? 
//simples
class Calculator
{
    private $valor;
    function __construct($inicial)
    {
        $this->valor = $inicial;
    }
    function soma($novo)
    {
        return $this->valor += $novo;
    }
    function divide($novo)
    {
        return $this->valor /= $novo;
    }
}
$calc = new Calculadora(10);
print $calc->soma(20);
print $calc->divide(2);

//2 pessoa codigo
class Pessoa
{
    private $nome;
    private $endereco;
    private $salario;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function reajustaSalario($perc) {
        $this->salario *= 1 + ($perc / 100);
    }
    // ...
}

$p1 = new Pessoa;
$p1->setSalario(1000);
$p1->reajustaSalario(50);
$p1->save();

print $p1->getSalary();

