'use strict';

class Pessoa {
    constructor(nome, idade, cpf, genero, celular, email) {
        this.nome = nome;
        this.idade = idade;
        this.cpf = cpf;
        this.genero = genero;
        this.celular = celular;
        this.email = email;
    }
}

const cadastrar = () => {
    const nome = document.getElementById('nome').value;
    const idade = document.getElementById('idade').value;
    const cpf = document.getElementById('cpf').value;
    const genero = document.getElementById('genero').value;
    const celular = document.getElementById('celular').value;
    const email = document.getElementById('email').value;

    if (nome && idade && cpf && genero && celular && email) {

        const pessoa = new Pessoa(
            nome,
            idade,
            cpf,
            genero,
            celular,
            email,
        );
        exibirPessoa(pessoa);
        limparForm();
    } else {
        alert('Preencha todos campos para continuar!');
    }
}

const exibirPessoa = (pessoa) => {
    const div = document.getElementById('div_pessoa');
    const trDados = document.createElement('tr');
    const tBody = document.getElementById('body_table');

    const tdNome = document.createElement('td');
    tdNome.innerHTML = pessoa.nome;
    tdNome.classList.add('text-center');

    const tdIdade = document.createElement('td');
    tdIdade.innerHTML = pessoa.idade;
    tdIdade.classList.add('text-center');

    const tdCpf = document.createElement('td');
    tdCpf.innerHTML = pessoa.cpf;
    tdCpf.classList.add('text-center');

    const tdGenero = document.createElement('td');
    tdGenero.innerHTML = pessoa.genero;
    tdGenero.classList.add('text-center');

    const tdEmail = document.createElement('td');
    tdEmail.innerHTML = pessoa.email;
    tdEmail.classList.add('text-center');

    trDados.appendChild(tdNome);
    trDados.appendChild(tdIdade);
    trDados.appendChild(tdCpf);
    trDados.appendChild(tdGenero);
    trDados.appendChild(tdEmail);

    div.classList.remove('d-none');
    tBody.appendChild(trDados);
}

const limparForm = () => {
    document.getElementById('nome').value = '';
    document.getElementById('idade').value = '';
    document.getElementById('cpf').value = '';
    document.getElementById('genero').value = '';
    document.getElementById('celular').value = '';
    document.getElementById('email').value = '';
}