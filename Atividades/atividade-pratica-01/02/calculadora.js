let valor1 = '';
let valor2 = '';
let operador = '';

const operadores = [
    '+', '-', '*', '/',
];

function limparValores() {
    const tela = document.getElementById('tela');
    valor1 = '';
    valor2 = '';
    operador = '';
    tela.value = '';
}

function addValores(input) {
    const valor = document.getElementById(input.id).value;
    const tela = document.getElementById('tela');
    if (operador) {
        if (operadores.indexOf(valor) == -1) {
            valor2 += valor;
            tela.value += valor;
        } else {
            operador = valor;
            tela.value = '';
        }
    } else {
        console.log(operadores.indexOf(valor))
        if (operadores.indexOf(valor) == -1) {
            valor1 += valor;
            tela.value += valor;
        } else {
            operador = valor;
            tela.value = '';
        }
    }
}

function calcular() {
    let resultado = 0;
    valor1 = parseFloat(valor1);
    valor2 = parseFloat(valor2);
    console.log(valor1, valor2)
    if (operador == '+') {
        resultado = valor1 + valor2;
    }
    if (operador == '-') {
        resultado = valor1 - valor2;
    }
    if (operador == '*') {
        resultado = valor1 * valor2;
    }
    if (operador == '/') {
        resultado = valor1 / valor2;
    }
    valor1 = '';
    valor2 = '';
    operador = '';
    document.getElementById('tela').value = resultado;
}