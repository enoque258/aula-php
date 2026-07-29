
<?
// Função responsável por procesar a matrícula de um aluno em uma ou mais turmas
function matricula($id_aluno, $turmas) {
    
    // Verifica se o aluno possui algum débito pendente no sistema
    $debitos = verifica_debitos($id_aluno);
    
    // Se não houver débitos ($debitos igual a 0), prossegue com o fluxo de matrícula
    if ($debitos == 0) {
        
        // Verifica se há conflito (choque) de horários entre as turmas selecionadas
        $choque = verifica_choque_turmas($turmas);
        
        // Se NÃO houver choque de horário (! $choque)
        if (!$choque) {
            
            // Percorre cada uma das turmas selecionadas pelo aluno
            foreach ($turmas as $id_turma) {
                
                // Verifica se o aluno atende aos pré-requisitos necessários para a turma atual
                if (verifica_prereq($id_aluno, $id_turma)) {
                    
                    // Soma o valor da turma ao valor total acumulado
                    $valor += calcula_valor_turma($id_turma);
                    
                    // Salva a matrícula do aluno na turma no banco de dados
                    grava_matricula($id_aluno, $id_turma);
                }
            }
            
            // Calcula o incentivo/desconto financeiro aplicável ao aluno
            $desconto = calcula_incentivo($id_aluno);
            
            // gera boleto com valor - desconto
        }
        
    } else {
        // Trata o erro caso o aluno possua débitos pendentes
        // ... erro
    }
}




-----------------------------------------------------------------------OUTRO EXERCICIO
