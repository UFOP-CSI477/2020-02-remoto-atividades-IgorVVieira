'use strict';

class Pessoa {
    constructor(nome, idade, cidade, bairro, rua, numeroCasa) {
        this.nome = nome;
        this.idade = idade;
        this.cidade = cidade;
        this.bairro = bairro;
        this.rua = rua;
        this.numeroCasa = numeroCasa;
    }
}


function novaPessoa() {
    const nome = window.prompt('Insira seu nome');
    const idade = window.prompt('Insira sua idade:');
    const cidade = window.prompt('Insira sua cidade:');
    const bairro = window.prompt('Insira seu bairro:');
    const rua = window.prompt('Insira sua rua:');
    const numeroCasa = window.prompt('Insira o número de sua casa');

    const pessoa = new Pessoa(nome, idade, cidade, bairro, rua, numeroCasa);
    preencherTable(pessoa);
}

function preencherTable(pessoa) {
    const divTable = document.getElementById('div_table');
    divTable.classList.remove('d-none');
    const tableBody = document.getElementById('body_table');

    const tr = document.createElement('tr');

    const tdNome = document.createElement('td');
    tdNome.innerHTML = pessoa.nome;

    const tdIdade = document.createElement('td');
    tdIdade.innerHTML = pessoa.idade;

    const tdCidade = document.createElement('td');
    tdCidade.innerHTML = pessoa.cidade;

    const tdBairro = document.createElement('td');
    tdBairro.innerHTML = pessoa.bairro;

    const tdRua = document.createElement('td');
    tdRua.innerHTML = pessoa.rua;

    const tdNumeroCasa = document.createElement('td');
    tdNumeroCasa.innerHTML = pessoa.numeroCasa;

    tr.appendChild(tdNome);
    tr.appendChild(tdIdade);
    tr.appendChild(tdCidade);
    tr.appendChild(tdBairro);
    tr.appendChild(tdRua);
    tr.appendChild(tdNumeroCasa);

    tableBody.appendChild(tr);
}