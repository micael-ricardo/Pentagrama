$(document).ready(function () {
    var columns = [
        {
            data: 'estado',
            title: 'Estado',
            width: "250px",
        },
        {
            data: 'cidade',
            title: 'Cidade',
            width: "250px",
        },
        {
            data: 'bairro',
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
            data: 'rua',
            title: 'Rua',
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
            data: 'cep',
            title: 'Cep',
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
        {
            data: 'id',
            title: 'Ações',
            width: "100px",
            render: function (data, type, row) {
                var cidade = row.nome;
                var bairro = row.bairro_nome;
                var btnDeletar = '<button type="button" data-bs-target="#ModalDeletar" data-bs-toggle="modal" data-id="' + data + '" data-nome="' + cidade + '"  data-bairro="' + bairro + '"class="btn btn-danger btn-sm excluir-local"><i class="bi bi-trash"></i></button>';

                return btnDeletar;

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
                d.cidade = $('#cidade').val();
                d.bairro = $('#bairro').val();
                d.rua = $('#rua').val();
                d.cep = $('#cep').val();
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

$('#data_inicio,#data_fim,#estado,#cidade,#bairro,#rua,#cep').on('change', function () {
    $('#datatable').DataTable().ajax.reload();
});

// Deletar
$(document).on("click", ".excluir-local", function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    var cidade = $(this).data('nome');
    var bairro = $(this).data('bairro');
    $('#nome-cidade').text(cidade);
    $('#nome-bairro').text(bairro);
    var formAction = $('#formExcluir').attr('action').replace(':id', id);
    $('#formExcluir').attr('action', formAction);
    $('#formExcluir input[name="id"]').val(id);
    $('#ModalDeletar').modal('show');
});
$(document).on("submit", "#formExcluir", function (e) {
    e.preventDefault();
    var form = this;
    function showError() {
        toastr.error('Ocorreu um erro ao excluir a local.');
    }
    $.ajax({
        url: form.action,
        type: form.method,
        data: $(form).serialize(),
        success: function (response, status, xhr) {
            if (xhr.status === 200) {
                toastr.success('Local excluída com sucesso!');
                $('#ModalDeletar').modal('hide');
                setTimeout(function () {
                    location.reload();
                }, 1000);
            } else {
                showError();
            }
        },
        error: function (xhr) {
            showError();
        },
        complete: function () {
            $('#ModalDeletar').modal('hide');
        }
    });
});