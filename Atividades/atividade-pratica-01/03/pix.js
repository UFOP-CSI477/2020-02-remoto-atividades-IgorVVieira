function preencherBancos(data) {
    const select = document.getElementById('bancos');
    for (const i in data) {
        const { ispb, fullName } = data[i];
        const option = document.createElement('option');
        option.value = ispb;
        option.innerHTML = fullName;
        select.appendChild(option);
    }
}

function carregarBancos() {
    fetch('https://brasilapi.com.br/api/banks/v1')
        .then(response => response.json())
        .then(data => preencherBancos(data))
        .catch(error => console.error(error));
}

class Pix {
    constructor(tipoOperacao, valor, total) {
        this.tipoOperacao = tipoOperacao;
        this.valor = valor;
        this.total = total;
    }

    enviar() {
        this.total -= this.valor;
    }
    receber() {
        this.total -= this.valor;
    }
}

function finalizarPix() {
    const tipoOperacao = document.getElementById('tipo_operacao').value;
    const tipoChave = document.getElementById('tipo_chave').value;
    const chave = document.getElementById('chave').value;
    const bancos = document.getElementById('bancos').value;
    const valor = document.getElementById('valor').value;
    const dataEnvio = document.getElementById('data_envio').value;
    if (validarEnvio(tipoOperacao, tipoChave, chave, bancos, valor, dataEnvio)) {
        const pix = new Pix(tipoOperacao, valor, valor);
    } else {
        alert('Preencha todos campos corretamente para finalizar');
    }
}

function validarEnvio(tipoOperacao, tipoChave, chave, bancos, valor, dataEnvio) {
    const novoValor = parseFloat(valor);
    if (tipoOperacao && tipoChave && chave && bancos && novoValor && dataEnvio) {
        return true;
    }
    return false;
}

function validarChave(select) {
    const div_chave = document.getElementById('div_chave');
    div_chave.classList.remove('d-none');
    const chave = document.getElementById('chave');
    const labelChave = document.getElementById('label_chave');

    if (select.value == 'email') {
        chave.setAttribute('type', 'email');
        chave.setAttribute('placeholder', 'andre@gmail.com');
        labelChave.innerHTML = 'E-mail';
    } else if (select.value == 'cpf') {
        chave.setAttribute('min', 11);
        chave.setAttribute('max', 11);
        labelChave.innerHTML = 'CPF';
        chave.setAttribute('placeholder', '14398562084');
    } else if (select.value == 'cnpj') {
        chave.setAttribute('min', 14);
        chave.setAttribute('max', 14);
        chave.setAttribute('placeholder', '11106373000168');
        labelChave.innerHTML = 'CNPJ';
    }
    else if (select.value == 'celular') {
        chave.setAttribute('min', 11);
        chave.setAttribute('max', 11);
        chave.setAttribute('placeholder', '31989652473');
        labelChave.innerHTML = 'Celular';
    }
    else {
        chave.setAttribute('placeholder', '38811835315');
        labelChave.innerHTML = 'Chave aleatória';
    }
}