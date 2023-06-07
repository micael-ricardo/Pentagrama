$(document).ready(function () {
    var columns = [
        {
            data: 'nome',
            title: 'Nome',
            width: "250px",
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
                d.nome = $('#nome').val();
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

$('#nome').on('change', function () {
    $('#datatable').DataTable().ajax.reload(); 
});