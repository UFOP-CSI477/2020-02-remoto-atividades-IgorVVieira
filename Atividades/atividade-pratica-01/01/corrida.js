const competidores = [];

class Competidor {
    static largada = 1;
    constructor(nome, tempo, largada) {
        this.largada = largada;
        this.nome = nome;
        this.tempo = tempo;
    }
}

function salvarCompetidor() {
    const nome = document.getElementById('nome').value;
    const tempo = document.getElementById('tempo').value;
    if (nome && tempo) {
        const competidor = new Competidor(nome, tempo, Competidor.largada++);
        competidores.push(competidor);
        createTableData(competidor);
        document.getElementById('form').reset();
    } else {
        alert('Preencha os campos para cadastrar.');
    }
}

function finalizaCorrida() {
    if (competidores.length === 0) {
        alert('Não é possível ter corrida sem competidores.');
    } else {
        const sort = competidores.sort((a, b) => a.tempo - b.tempo);
        let tempos = [];
        for (const i in sort) {
            tempos[i] = sort[i].tempo;
        }
        const menorTempo = Math.min.apply(null, tempos);
        createTableResultado(sort, menorTempo);
        while (competidores.length) {
            competidores.pop();
        }
    }
}

function createTableData(competidor) {
    const div_table = document.getElementById('div_table');
    div_table.classList.remove('d-none');

    const body_table = document.getElementById('body_table');

    const tr = document.createElement('tr');
    tr.classList.add('text-center');

    const tdLargada = document.createElement('td');
    tdLargada.innerHTML = competidor.largada;

    const tdNome = document.createElement('td');
    tdNome.innerHTML = competidor.nome;

    const tdTempo = document.createElement('td');
    tdTempo.innerHTML = competidor.tempo;

    tr.appendChild(tdLargada);
    tr.appendChild(tdNome);
    tr.appendChild(tdTempo);
    body_table.appendChild(tr);
}

function createTableResultado(competidores, menorTempo) {
    console.log(menorTempo);
    const div_table_resultado = document.getElementById('div_table_resultado');
    div_table_resultado.classList.remove('d-none');

    const body_table_resultado = document.getElementById('body_table_resultado');

    competidores.forEach((competidor, index) => {
        const tr = document.createElement('tr');
        tr.classList.add('text-center');

        const tdPosicao = document.createElement('td');
        tdPosicao.innerHTML = index + 1;

        const tdLargada = document.createElement('td');
        tdLargada.innerHTML = competidor.largada;

        const tdNome = document.createElement('td');
        tdNome.innerHTML = competidor.nome;

        const tdTempo = document.createElement('td');
        tdTempo.innerHTML = competidor.tempo;

        const tdResultado = document.createElement('td');
        if (competidor.tempo == menorTempo) {
            tdResultado.innerHTML = 'Vencedor(a)';
        } else {
            tdResultado.innerHTML = '-';
        }

        tr.appendChild(tdPosicao);
        tr.appendChild(tdLargada);
        tr.appendChild(tdNome);
        tr.appendChild(tdTempo);
        tr.appendChild(tdResultado);
        body_table_resultado.appendChild(tr);
    });
}

function novaCompeticao() {
    const divTable = document.getElementById('div_table');
    const divTableResultado = document.getElementById('div_table_resultado');
    divTable.getElementsByTagName('tbody')[0].innerHTML = '';
    divTable.classList.add('d-none');

    divTableResultado.getElementsByTagName('tbody')[0].innerHTML = '';
    divTableResultado.classList.add('d-none');

    while (competidores.length) {
        competidores.pop();
    }
}