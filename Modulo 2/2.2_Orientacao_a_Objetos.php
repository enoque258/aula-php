 
 <?
 // Definição da classe Aluno que representa o modelo de domínio do Estudante
class Aluno {
    
    // Método para realizar a matrícula do aluno em uma ou mais turmas
    function matricular($turmas) {
        
        // Chama o método interno da própria classe ($this) para verificar se o aluno tem débitos
        $debitos = $this->verificaDebitos();
        
        // Se o aluno não tiver débitos ($debitos igual a 0), autoriza o processo
        if ($debitos == 0) {
            
            // Iteração sobre cada objeto de turma recebido
            foreach ($turmas as $turma) {
                
                // Instancia um novo objeto da classe Matricula
                $mat = new Matricula;
                
                // Associa a instância do próprio aluno ($this) ao objeto de matrícula
                $mat->setAluno( $this );
                
                // Associa o objeto da turma atual ao objeto de matrícula
                $mat->setTurma( $turma );
                
                // Executa a validação dos pré-requisitos no próprio objeto de matrícula
                if ($mat->verificaPrereq()) {
                    
                    // Obtém o valor referente à matrícula e soma ao total acumulado
                    $valor += $mat->getValor();
                    
                    // Persiste/salva o registro da matrícula no banco de dados
                    $mat->save();
                }
            }
        }
    }
}



//2+++++-+-+-+-CERTO-+-+-+-+--+-+-+---+++-+-+-+---++-+--++-+-+-+---+++-+-+
class Aluno {
    function matricular($turmas) {
        $debitos = $this->verificaDebitos();
        if ($debitos == 0)
        {
            foreach ($turmas as $turma) {
                $mat = new Matricula;
                $mat->setAluno( $this );
                $mat->setTurma( $turma );

                if ($mat->verificaPrereq()) {
                    $valor += $mat->getValor();
                    $mat->save();
                }
            }
        }
    }
}

$aluno=new Aluno (5005)
$aluno matricular( [new Turma (1001), new Turma (1002), new Turma (1003)] );

