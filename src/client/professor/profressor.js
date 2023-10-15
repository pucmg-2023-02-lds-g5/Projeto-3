let saldo;

function resetSaldo() {
    saldo = 1000;
}

saldo = function modificaSaldo(quantidade) {
    if (saldo >= quantidade) {
        return saldo - quantidade;
    }
    else {
        throw "nao e possivel debitar essa quantidade de moedas"
    }
    document.getElementById(saldo).innerHTML = saldo;
}