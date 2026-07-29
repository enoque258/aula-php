 <?php
 // 1 parâmetros de entrada
$a = 1;
$b = -5;
$c = 6;

// Calcula delta
$delta = ($b*$b)-((4*$a)*$c);

// Equação
$x1 = (-$b + sqrt ($delta)) / (2 * $a);
$x2 = (-$b - sqrt ($delta)) / (2 * $a);

// Exibindo os valores
print 'O valor de x1 é: '."$x1"."\n";
print 'O valor de x2 é: '."$x2"."\n";

//2 estrutura de repiticao
$contador = 5;
$fatorial = 1;
while ($contador > 0)
{
    $fatorial *= $contador; // Multiplica.
    $contador--; // Decrementa.
}
print $fatorial;

//3 decisão structure
$peso = 80; // vem da tela
$altura = 1.8; // vem da tela
$imc = $peso / ($altura * $altura);
if ($imc < 18.5 ) {
    print 'Abaixo do peso';
}
else if ($imc > 25) {
    print 'Acima do peso';
}
else {
    print 'No peso';
}

//4 modulacao
function imc($peso, $altura)
{
    return $peso / ($altura * $altura);
}

$peso = 80; // vem da tela
$altura = 1.8; // vem da tela
$imc = imc($peso, $altura);
if ($imc < 18.5 ) {
    print 'Abaixo do peso';
}
else if ($imc > 25) {
    print 'Acima do peso';
}
else {
    print 'No peso';
}

//modulacao exemplo bhascara 
function delta($a, $b, $c) {
    return ($b*$b)-((4*$a)*$c);
}

function baskara ($a, $b, $c) {
    $delta = delta($a, $b, $c);
    $x1 = (-$b + sqrt ($delta)) / (2 * $a);
    $x2 = (-$b - sqrt ($delta)) / (2 * $a);
    return array($x1, $x2);
}

// parâmetros de entrada
$a = 1;
$b = -5;
$c = 6;

list ($x1, $x2) = baskara($a, $b, $c);
// Exibindo os valores
print 'O valor de x1 é: '."$x1"."\n";
print 'O valor de x2 é: '."$x2"."\n";

//nao usar -referente a estruturado
function matricula($id_aluno, $turmas)
{
    verifica_debitos($id_aluno);
    verifica_choque_turmas($turmas);
    verifica_prereq($id_aluno, $id_turma);
    calcula_valor_turm($id_turma);
    grava_matricula($id_aluno, $id_turma);
    calcula_incentivo($id_aluno);
}

function verifica_debitos($id_aluno)
{
    $sql = "SELECT sum(valor) FROM titulo WHERE id_aluno='$id_aluno'";
}

function grava_matricula($id_aluno, $id_turma)
{
    $sql = "INSERT INTO matricula (id_aluno, id_turma) values ...";
}


