$('#calcular').click((event) => {
    event.preventDefault();
    var altura = parseInt($('#altura').val()) / 100;
    var peso = parseInt($('#peso').val());
    let imc = (peso / (altura * altura)).toFixed(1);

    var dic = {
        1: "Subnutrição",
        2: "Saudável",
        3: "Sobrepeso",
        4: "Obesidade Grau I",
        5: "Obesidade Grau II",
        6: "Obesidade Grau III",
    }

    var classificacao;
    var cor;

    if (imc >= 40) {
        classificacao = 6
        cor = 'rgb(236,0,0)'
    } else if (imc < 40 && imc >= 35) {
        classificacao = 5;
        cor = 'rgb(255,122,0)'
    } else if (imc < 35 && imc >= 30) {
        classificacao = 4;
        cor = 'rgb(255,202,0)'
    } else if (imc < 30 && imc >= 25) {
        classificacao = 3;
        cor = 'rgb(235,220,30)'
    } else if (imc < 25 && imc >= 18.5) {
        classificacao = 2;
        cor = 'rgb(0,189,77)'
    } else {
        classificacao = 1;
        cor = 'rgb(0,192,248)'
    }

    recomendado1 = (altura * altura * 18.5).toFixed(0);
    recomendado2 = (altura * altura * 24.9).toFixed(0);
    document.getElementById('imc').innerHTML = imc + ' - ' + dic[classificacao];
    document.getElementById('imc').style.color = cor
    document.getElementById('imc').style.backgroundColor = 'black'
    document.getElementById('recomendado').innerHTML = recomendado1 + " a " + recomendado2 + " Kg"

})