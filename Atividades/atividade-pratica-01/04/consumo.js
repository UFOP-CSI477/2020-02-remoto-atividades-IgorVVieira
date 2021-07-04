class Consumo {
    constructor(combustivel, km) {
        this.combustivel = combustivel;
        this.km = km;
    }

    desempenhoKm() {
        return parseFloat(this.km / this.combustivel, 2).toFixed(2);
    }
}

const resultado = [];

function adicionarVeiculo() {
    const combustivel = document.getElementById('combustivel').value;
    const km = document.getElementById('km').value;
    if (parseFloat(combustivel) && parseFloat(km)) {
        const consumo = new Consumo(combustivel, km);
        resultado.push(consumo);
        criarListaComsumo(consumo);
        document.getElementById('combustivel').value = '';
        document.getElementById('km').value = '';
    } else {
        alert('Insira valores válidos');
    }
}

function finalizar() {
    if (resultado.length === 0) {
        alert('Preencha os veículos para finalizar.');
    } else {
        let combustivelTotal = 0;
        let kmTotal = 0;
        let KmLTotal = 0;
        let mediaConsumo = 0;
        let mediaKm = 0;
        let mediaKmL = 0;
        resultado.forEach(result => {
            combustivelTotal += parseFloat(result.combustivel);
            kmTotal += parseFloat(result.km).toFixed(2);
            KmLTotal += parseFloat(result.desempenhoKm());
        });
        mediaConsumo = combustivelTotal / resultado.length;
        mediaKm = parseFloat(kmTotal / resultado.length).toFixed(2);
        mediaKmL = parseFloat(KmLTotal / resultado.length).toFixed(2);
        criarListaFinalizada(combustivelTotal, kmTotal, mediaConsumo, mediaKm, mediaKmL);
    }
}

function criarListaComsumo(consumo) {
    const divAdicionar = document.getElementById('div_adicionar');
    const listConsumo = document.getElementById('list_consumo');
    const liCombustivel = document.createElement('li');
    liCombustivel.innerHTML = `Quantidade de combustível: ${consumo.combustivel}`;

    const liKm = document.createElement('li');
    liKm.innerHTML = `Quantidade de quilômetros rodados: ${consumo.km}`;

    const desempenhoKm = document.createElement('li');
    desempenhoKm.innerHTML = `= Desempenho em quilômetros por litro (Km/l): ${consumo.desempenhoKm()}`;

    listConsumo.appendChild(liCombustivel);
    listConsumo.appendChild(liKm);
    listConsumo.appendChild(desempenhoKm);
    listConsumo.appendChild(document.createElement('hr'))
    divAdicionar.classList.remove('d-none');
}

function criarListaFinalizada(combustivelTotal, kmTotal, mediaConsumo, mediaKm, mediaKmL) {
    const divResultado = document.getElementById('div_resultado');
    const listResultado = document.getElementById('list_resultado');
    const liCombustivelTotal = document.createElement('li');
    liCombustivelTotal.innerHTML = `= Quantidade total de combustível utilizada: ${combustivelTotal}`;

    const liKmTotal = document.createElement('li');
    liKmTotal.innerHTML = `= Quantidade total de quilômetros rodados: ${kmTotal}`;

    const liMediaConsumo = document.createElement('li');
    liMediaConsumo.innerHTML = `= Média de consumo de combustível: ${mediaConsumo}`;

    const liMediaKm = document.createElement('li');
    liMediaKm.innerHTML = `= Média de quilômetros rodados: ${mediaKm}`;

    const liMediaKmL = document.createElement('li');
    liMediaKmL.innerHTML = `= Média de desemepenho em quilômetros por litro (Km/l): ${mediaKmL}`;

    listResultado.appendChild(liCombustivelTotal);
    listResultado.appendChild(liKmTotal);
    listResultado.appendChild(liMediaConsumo);
    listResultado.appendChild(liMediaKm);
    listResultado.appendChild(liMediaKmL);
    listResultado.appendChild(document.createElement('hr'))
    divResultado.classList.remove('d-none');
}