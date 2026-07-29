<?php

/*
============================================================
EXERCÍCIO DE MODELAGEM - SISTEMA DE CONTROLO DE EVENTOS
============================================================

CLASSES DO SISTEMA

- Evento
- Palestra
- Ministrante
- Participante

RELACIONAMENTOS

1) Evento possui várias palestras.
   Relação: COMPOSIÇÃO

2) Palestra possui um ministrante.
   Relação: ASSOCIAÇÃO

3) Participante pode inscrever-se em vários eventos.
   Relação: ASSOCIAÇÃO

4) Participante pode inscrever-se em várias palestras.
   Relação: ASSOCIAÇÃO

Não existe herança nem agregação neste exercício.

============================================================
*/


/*
============================================================
CLASSE MINISTRANTE
============================================================

Representa a pessoa responsável por ministrar
uma palestra.

Uma palestra possui apenas um ministrante.

*/

class Ministrante
{
    public string $nome;
    public string $telefone;
    public string $email;

    public function __construct(
        string $nome,
        string $telefone,
        string $email
    )
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
    }

    public function apresentar()
    {
        echo "Ministrante: {$this->nome}<br>";
    }
}


/*
============================================================
CLASSE PALESTRA
============================================================

Cada palestra pertence a um evento
e possui um ministrante.

Relacionamento:

Palestra -------- Ministrante

(Associação)

*/

class Palestra
{
    public string $nome;
    public string $data;
    public string $turno;
    public int $duracao;
    public string $tema;
    public string $sala;

    // Associação
    public Ministrante $ministrante;

    public function __construct(
        string $nome,
        string $data,
        string $turno,
        int $duracao,
        string $tema,
        string $sala,
        Ministrante $ministrante
    )
    {
        $this->nome = $nome;
        $this->data = $data;
        $this->turno = $turno;
        $this->duracao = $duracao;
        $this->tema = $tema;
        $this->sala = $sala;
        $this->ministrante = $ministrante;
    }

    public function mostrar()
    {
        echo "Palestra: {$this->nome}<br>";
        echo "Tema: {$this->tema}<br>";
        echo "Sala: {$this->sala}<br>";
        echo "Ministrante: {$this->ministrante->nome}<br><br>";
    }
}


/*
============================================================
CLASSE EVENTO
============================================================

Um evento possui várias palestras.

Relacionamento:

Evento ♦------ Palestra

(COMPOSIÇÃO)

A composição significa que as palestras fazem
parte do evento.

*/

class Evento
{
    public string $nome;
    public string $local;
    public string $data;
    public string $inicio;
    public string $fim;

    // Composição
    private array $palestras = [];

    public function __construct(
        string $nome,
        string $local,
        string $data,
        string $inicio,
        string $fim
    )
    {
        $this->nome = $nome;
        $this->local = $local;
        $this->data = $data;
        $this->inicio = $inicio;
        $this->fim = $fim;
    }

    /*
        Adiciona uma palestra ao evento.
    */
    public function adicionarPalestra(Palestra $palestra)
    {
        $this->palestras[] = $palestra;
    }

    /*
        Mostra todas as palestras do evento.
    */
    public function listarPalestras()
    {
        echo "<h3>Evento: {$this->nome}</h3>";

        foreach ($this->palestras as $palestra)
        {
            $palestra->mostrar();
        }
    }
}


/*
============================================================
CLASSE PARTICIPANTE
============================================================

Um participante pode:

- Inscrever-se em vários eventos.
- Inscrever-se em várias palestras.

Relacionamento:

Participante -------- Evento

Participante -------- Palestra

(ASSOCIAÇÃO)

*/

class Participante
{
    public string $nome;
    public string $telefone;
    public string $endereco;
    public string $email;

    private array $eventos = [];
    private array $palestras = [];

    public function __construct(
        string $nome,
        string $telefone,
        string $endereco,
        string $email
    )
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->endereco = $endereco;
        $this->email = $email;
    }

    /*
        Inscreve o participante num evento.
    */
    public function inscreverEvento(Evento $evento)
    {
        $this->eventos[] = $evento;
    }

    /*
        Inscreve o participante numa palestra.
    */
    public function inscreverPalestra(Palestra $palestra)
    {
        $this->palestras[] = $palestra;
    }

    /*
        Mostra todas as inscrições.
    */
    public function mostrarInscricoes()
    {
        echo "<h2>Participante: {$this->nome}</h2>";

        echo "<h3>Eventos:</h3>";

        foreach ($this->eventos as $evento)
        {
            echo "- {$evento->nome}<br>";
        }

        echo "<br>";

        echo "<h3>Palestras:</h3>";

        foreach ($this->palestras as $palestra)
        {
            echo "- {$palestra->nome}<br>";
        }
    }
}


/*
============================================================
CRIANDO OBJETOS
============================================================
*/

$ministrante = new Ministrante(
    "Carlos Silva",
    "848888888",
    "carlos@email.com"
);

$palestra1 = new Palestra(
    "PHP Orientado a Objetos",
    "20/07/2026",
    "Manhã",
    2,
    "POO em PHP",
    "Sala A",
    $ministrante
);

$palestra2 = new Palestra(
    "Laravel",
    "20/07/2026",
    "Tarde",
    3,
    "Framework Laravel",
    "Sala B",
    $ministrante
);

$evento = new Evento(
    "Semana da Tecnologia",
    "Maputo",
    "20/07/2026",
    "08:00",
    "17:00"
);

/*
============================================================
COMPOSIÇÃO

O evento passa a possuir as palestras.
============================================================
*/

$evento->adicionarPalestra($palestra1);
$evento->adicionarPalestra($palestra2);

/*
============================================================
CRIANDO PARTICIPANTE
============================================================
*/

$participante = new Participante(
    "João Pedro",
    "841111111",
    "Maputo",
    "joao@email.com"
);

/*
============================================================
ASSOCIAÇÃO

Participante inscreve-se no evento
e também nas palestras.
============================================================
*/

$participante->inscreverEvento($evento);

$participante->inscreverPalestra($palestra1);
$participante->inscreverPalestra($palestra2);

/*
============================================================
RESULTADOS
============================================================
*/

$evento->listarPalestras();

echo "<hr>";

$participante->mostrarInscricoes();

?>