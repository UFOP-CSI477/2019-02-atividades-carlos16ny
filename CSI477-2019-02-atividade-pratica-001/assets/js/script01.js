$('#calcular').click((event) => {
    event.preventDefault();
    var table = $('#tabela1body');
    lines = table.find('tr');
    competidores = [];
    for (let i = 1; i < lines.length - 1; ++i) {
        dados = $(lines[i]).find('td')
        comp = {
            largada: $(dados[0]).find('input').val(),
            nome: $(dados[1]).find('input').val(),
            tempo: parseInt($(dados[2]).find('input').val())
        }
        competidores.push(comp)
    }

    var compOrdenados = competidores.sort(function(a, b) {
        if (a.tempo > b.tempo) {
            return 1;
        }
        if (a.tempo < b.tempo) {
            return -1;
        }
        return 0;
    })

    console.log(compOrdenados);
    createTable(compOrdenados);
    $('#modal-resultado').modal();
});

function createTable(ordenados) {
    var final = [];
    [...ordenados].forEach((comp, index) => {
        if (index == 0) {
            final.push({
                pos: index + 1,
                largada: comp.largada,
                nome: comp.nome,
                tempo: comp.tempo,
                clas: (index + 1 == 1 ? 'Vencedor(a)' : '')
            })
        } else {
            if (comp.tempo == final[index - 1].tempo) {
                final.push({
                    pos: final[index - 1].pos,
                    largada: comp.largada,
                    nome: comp.nome,
                    tempo: comp.tempo,
                    clas: (final[index - 1].pos == 1 ? 'Vencedor(a)' : '')
                })
            } else {
                final.push({
                    pos: index + 1,
                    largada: comp.largada,
                    nome: comp.nome,
                    tempo: comp.tempo,
                    clas: ''
                })
            }
        }
    });
    var tabela = document.createElement('table');
    tabela.className = 'table table-striped text-center';
    let row = tabela.insertRow();
    row.innerHTML = "<tr><td>Posição</td><td>Largada</td><td>Nome</td><td>Tempo</td><td>Classificação</td></tr>";

    final.forEach(p => {
        let row = tabela.insertRow();
        row.innerHTML += '<td>' + p.pos + '</td>';
        row.innerHTML += '<td>' + p.largada + '</td>';
        row.innerHTML += '<td>' + p.nome + '</td>';
        row.innerHTML += '<td>' + p.tempo + '</td>';
        row.innerHTML += '<td>' + p.clas + '</td>';

    })
    $('#result').empty();
    document.getElementById('result').appendChild(tabela);
}