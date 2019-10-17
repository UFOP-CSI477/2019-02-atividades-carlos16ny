$('button[type=submit]').click((event) => {
    var amp = parseInt($('#amp').val());
    var int = parseInt($('#temp').val());

    escala = (Math.log10(amp) + 3 * Math.log10(8 * int) - 2.92).toFixed(2);

    var dic = {
        1: 'Geralmente não sentido, mas gravado.',
        2: 'Às vezes sentido, mas raramente causa dados.',
        3: 'No máximo causa pequenos danos a predidos bem construidos, mas pode danificar seriamente casas mal construidas em regiões próximas.',
        4: 'Pode ser destrutivo em áreas em torno de até 100km do epicentro.',
        5: 'Grande Terremoto. Pode causar sérios danos numa grande faixa.',
        6: 'Enorme terremoto. Pode causar graves danos em muitas áreas, mesmo que estejam a centenas de quilômetros',
    }

    var ident;

    if (escala >= 8) {
        ident = 6;
    } else if (escala < 8 && escala >= 7) {
        ident = 5;
    } else if (escala < 7 && escala >= 6.1) {
        ident = 4;
    } else if (escala < 6.1 && escala >= 5.5) {
        ident = 3;
    } else if (escala < 5.5 && escala >= 3.5) {
        ident = 2;
    } else {
        ident = 1;
    }

    document.getElementById('resultado').innerHTML = "Magnitude: " + escala + "<br>" + dic[ident];
})