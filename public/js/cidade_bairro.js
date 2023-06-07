
$(document).ready(function () {
    var $checkbox = $('#cadastrarbairro');
    $checkbox.click(function () {
        if ($checkbox.is(':checked')) {
            $('#nome_bairro, #cidade_bairro').attr('required', true);
        } else {
            $('#nome_bairro, #cidade_bairro').removeAttr('required');
        }
    });
});

// Inserir select2 + chamar API
$(document).ready(function () {
    $('.select2').select2({
        placeholder: 'Selecione uma cidade',
        allowClear: true,
        minimumInputLength: 3,
        ajax: {
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/municipios',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term
                };
            },
            processResults: function (data) {
                var results = [];
                $.each(data, function (index, item) {
                    results.push({
                        id: item.id,
                        nome: item.nome,
                        text: item.nome
                    });
                });
                return {
                    results: results
                };
            }
        }
    }).on('select2:select', function (event) {
        var id = event.params.data.id;
        $.get('https://servicodados.ibge.gov.br/api/v1/localidades/municipios/' + id, function (data) {

            var estado = data['regiao-imediata']['regiao-intermediaria']['UF']['nome'];
            var data_fundacao = data.data_de_fundacao;
            var estado = data.microrregiao.mesorregiao.UF.nome;
            $('#nome_cidade').val(data.nome);
            $('#data_fundacao').val(data_fundacao);
            $('#estado').val(estado);
        });
    });
});

