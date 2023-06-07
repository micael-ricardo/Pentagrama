$(document).ready(function () {
    var columns = [
        {
            data: 'estado',
            title: 'Estado',
            width: "250px",
        },
        {
            data: 'nome',
            title: 'Cidade',
            width: "250px",
        },
        {
            data: 'bairro_nome',
            title: 'Bairro',
            width: "250px",
            render: function (data, type, row) {
                if (data) {
                    return data;
                } else {
                    return '-';
                }
            },
            className: 'text-center'
        },
        {
            data: 'data_fundacao',
            title: 'Data Fundação',
            width: "250px",
            render: function (data, type, row) {
                var dataFormatada = moment(data).format('DD/MM/YYYY');
                return dataFormatada;
            },
            className: 'text-center'
        },
    ]

    $('#datatable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ajax: {
            url: dataTable,
            method: 'GET',
            // filtro
            data: function (d) {
                d.data_inicio = $('#data_inicio').val(); 
                d.data_fim = $('#data_fim').val(); 
                d.estado = $('#estado').val();
                d.nome = $('#nome').val();
                d.bairro_nome = $('#bairro_nome').val();
            }
        },
        columns: columns,
        responsive: true,
        scrollX: true,
        scrollY: '500px',
        language: {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            }
        },
        lengthMenu: [[10, 20, 50, -1], [10, 20, 50, "Todos"]],
    });
});

// recarrega tabela com  valor do filtrado

$('#data_inicio,#data_fim,#estado,#nome,#bairro_nome').on('change', function () {
    $('#datatable').DataTable().ajax.reload(); 
});