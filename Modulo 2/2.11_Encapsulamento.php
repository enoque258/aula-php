 <?php

/**
 * ============================================================================
 * 2.11 ENCAPSULAMENTO E HERANÇA (Baseado no Diagrama UML)
 * ============================================================================
 * 
 * Símbolos do diagrama UML:
 * '#' (hashtag) = protected (acessível na própria classe e em subclasses)
 * '+' (mais)    = public    (acessível de qualquer lugar)
 * '-' (menos)   = private   (acessível APENAS dentro da própria classe)
 */

abstract class Conta 
{
    // Atributos protegidos (#) conforme o diagrama
    protected string $agencia;
    protected string $conta;
    protected float $saldo;

    public function __construct(string $agencia, string $conta, float $saldoInicial = 0.0) 
    {
        $this->agencia = $agencia;
        $this->conta = $conta;
        $this->saldo = $saldoInicial;
    }

    // Método público (+): Depositar valor na conta
    public function depositar(float $quantia): void 
    {
        if ($quantia > 0) {
            $this->saldo += $quantia;
        }
    }

    // Método público (+): Retornar o saldo (Getter para acessar atributo protegido)
    public function getSaldo(): float 
    {
        return $this->saldo;
    }
}

/**
 * Subclasse ContaPoupanca herda de Conta
 */
class ContaPoupanca extends Conta 
{
    // Método público (+): Retirar dinheiro sem permitir saldo negativo
    public function retirar(int $quantia): bool 
    {
        if ($quantia > 0 && $this->saldo >= $quantia) {
            $this->saldo -= $quantia; // Acessa $saldo porque é 'protected'
            return true;
        }
        return false;
    }
}

/**
 * Subclasse ContaCorrente herda de Conta e possui limite de crédito
 */
class ContaCorrente extends Conta 
{
    // Atributo protegido (#) exclusivo da ContaCorrente
    protected float $limite;

    public function __construct(string $agencia, string $conta, float $saldoInicial, float $limite) 
    {
        parent::__construct($agencia, $conta, $saldoInicial);
        $this->limite = $limite;
    }

    // Método público (+): Retirar considerando saldo + limite
    public function retirar(float $quantia): bool 
    {
        $saldoDisponivel = $this->saldo + $this->limite;

        if ($quantia > 0 && $saldoDisponivel >= $quantia) {
            $this->saldo -= $quantia;
            return true;
        }
        return false;
    }
}


/**
 * ============================================================================
 * 2.11.2 PROPRIEDADES SOMENTE-LEITURA (Readonly Properties - PHP 8.1+)
 * ============================================================================
 * 
 * Propriedades 'readonly' só podem ser atribuídas UMA ÚNICA VEZ (no construtor/inicialização).
 * Depois de definidas, seu valor não pode mais ser alterado/sobrescrito.
 */

class ExemploReadonly 
{
    // Permite leitura pública de fora, mas garante que a agência nunca mude após ser criada
    public readonly string $agencia;

    public function __construct(string $agencia) 
    {
        $this->agencia = $agencia; // Definido na inicialização
    }

    public function tentarAlterar() 
    {
        // $this->agencia = "9999"; // ERRO FATAL: Não é possível modificar propriedade readonly!
    }
}


/**
 * ============================================================================
 * 2.11.3 VISIBILIDADE ASSIMÉTRICA (Asymmetric Visibility - PHP 8.4+)
 * ============================================================================
 * 
 * Permite definir visibilidades DIFERENTES para a LEITURA (get) e ESCRITA (set).
 * Elimina a necessidade de métodos 'getters' manuais em muitas situações.
 */

class ExemploVisibilidadeAssimetrica 
{
    // Leitura é 'public' (qualquer um pode ler), mas a Modificação é 'private' (só a classe altera)
    public private(set) float $saldo = 0.0;

    // Leitura é 'public', mas a modificação só é permitida por ela e por subclasses ('protected')
    public protected(set) string $status = 'Ativa';

    public function depositar(float $quantia): void 
    {
        if ($quantia > 0) {
            $this->saldo += $quantia; // Permitido internamente!
        }
    }
}


// ============================================================================
// TESTANDO O CÓDIGO
// ============================================================================

$cc = new ContaCorrente("1001", "55443-1", 500.00, 1000.00);

// Tentando sacar R$ 1200 (usa o saldo de 500 + limite de 1000)
if ($cc->retirar(1200.00)) {
    echo "Saque efetuado com sucesso!\n";
} else {
    echo "Saldo insuficiente!\n";
}

echo "Saldo atual: R$ " . $cc->getSaldo() . "\n"; // Retorna -700 (usou o limite)

// Teste de visibilidade assimétrica (PHP 8.4+):
$contaAssimetrica = new ExemploVisibilidadeAssimetrica();
$contaAssimetrica->depositar(250.00);

// Lendo a propriedade diretamente sem getter (Público para leitura):
echo "Saldo visibilidade assimétrica: " . $contaAssimetrica->saldo . "\n"; 

// $contaAssimetrica->saldo = 500.00; // ERRO FATAL: A alteração (set) é 'private'!
