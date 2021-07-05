const valorEnvio = [];
const valorRecebimento = [];
let saldoTotal = 0;

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

function realizarPix() {
    const valor = document.getElementById('valor').value;
    const tipoOperacao = document.getElementById('tipo_operacao').value;
    const tipoChave = document.getElementById('tipo_chave').value;
    const chave = document.getElementById('chave').value;
    const bancos = document.getElementById('bancos').value;
    const dataEnvio = document.getElementById('data_envio').value;
    if (validarEnvio(tipoOperacao, tipoChave, chave, bancos, valor, dataEnvio)) {
        if (tipoOperacao == 'enviar' && valor > saldoTotal) {
            alert('Operação inválida que resultará sem saldo na conta.');
        } else if (tipoOperacao == 'enviar') {
            saldoTotal -= parseFloat(valor);
            valorEnvio.push(parseFloat(valor));
        } else if (tipoOperacao == 'receber') {
            saldoTotal += parseFloat(valor);
            valorRecebimento.push(parseFloat(valor));
        }
        limparCampos();
    } else {
        alert('Preencha todos campos corretamente para finalizar');
    }
}

function finalizarPix() {
    limparCampos();
    document.getElementById('div_resultado').classList.remove('d-none');
    const tBody = document.getElementById('body_table');

    const tdValorTotalEnvio = document.createElement('td');
    const tdValorTotalRecebido = document.createElement('td');
    const tdValorTotal = document.createElement('td');
    tdValorTotal.innerHTML = `R$ ${parseFloat(saldoTotal).toFixed(2)}`;

    let valorTotalEnvio = 0;
    let valorTotalRecebido = 0;
    valorEnvio.forEach(envio => {
        valorTotalEnvio += envio;
    });

    valorRecebimento.forEach(recebido => {
        valorTotalRecebido += recebido;
    });
    document.getElementById('btnRealizarPix').setAttribute('disabled', true);
    document.getElementById('btnFinalizarPix').setAttribute('disabled', true);

    tdValorTotalEnvio.innerHTML = `R$ ${parseFloat(valorTotalEnvio).toFixed(2)}`;
    tdValorTotalRecebido.innerHTML = `R$ ${parseFloat(valorTotalRecebido).toFixed(2)}`;
    tBody.appendChild(tdValorTotalEnvio);
    tBody.appendChild(tdValorTotalRecebido);
    tBody.appendChild(tdValorTotal);
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
    } else if (select.value == 'celular') {
        chave.setAttribute('min', 11);
        chave.setAttribute('max', 11);
        chave.setAttribute('placeholder', '31989652473');
        labelChave.innerHTML = 'Celular';
    } else {
        chave.setAttribute('placeholder', '38811835315');
        labelChave.innerHTML = 'Chave aleatória';
    }
}

function limparCampos() {
    document.getElementById('tipo_operacao').value = '';
    document.getElementById('tipo_chave').value = '';
    document.getElementById('chave').value = '';
    document.getElementById('bancos').value = '';
    document.getElementById('valor').value = '';
    document.getElementById('data_envio').value = '';
}