
// Inserir required caso o campo esteja esposto
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
        // Preencher o estado apos selecionar a cidade
    }).on('select2:select', function (event) {
        var id = event.params.data.id;
        $.get('https://servicodados.ibge.gov.br/api/v1/localidades/municipios/' + id, function (data) {
            var estado = data['regiao-imediata']['regiao-intermediaria']['UF']['nome'];
            var data_fundacao = data.data_de_fundacao;
            var estado = data.microrregiao.mesorregiao.UF.nome;
            $('#nome_cidade').val(data.nome);
            $('#data_fundacao').val(data_fundacao);
            $('#estado').val(estado);

            // Cadastrar bairros que tem na cidade selecionada
            $('.select2-bairros').select2({
                placeholder: 'Selecione um bairro',
                allowClear: true,
                minimumInputLength: 3,
                ajax: {
                    url: 'https://nominatim.openstreetmap.org/search',
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term + ', ' + data.nome + ', ' + estado,
                            format: 'json',
                            addressdetails: 1,
                            countrycodes: 'br',
                            limit: 10
                        };
                    },
                    processResults: function (data) {
                        var results = [];
                        $.each(data, function (index, item) {
                            if (item.address.suburb) {
                                results.push({
                                    id: item.place_id,
                                    text: item.address.suburb
                                });
                            }
                        });
                        return {
                            results: results
                        };
                    }
                }
            });
        });
    });
});




// Tentar puxar a data da fundação da cidade de alguma forma

// .on('select2:select', function(event) {
//     var cidade = event.params.data.text.split(' - ')[0];

//     $.ajax({
//         url: '/cidades/data-de-fundacao',
//         method: 'POST',
//         data: {
//             cidade: cidade,
//             _token: $('meta[name="csrf-token"]').attr('content')
//         },
//         success: function(response) {
//             var data_fundacao = response.dataDeFundacao;
//             var estado = event.params.data.text.split(' - ')[1];

//             if (data_fundacao) {
//                 $('#data_fundacao').val(data_fundacao);
//             } else {
//                 $('#data_fundacao').val('');
//                 alert('Não foi possível encontrar a data de fundação de ' + cidade + '.');
//             }

//             $('#estado').val(estado);
//         },
//         error: function() {
//             alert('Ocorreu um erro ao buscar a data de fundação. Por favor, tente novamente.');
//         }
//     });
// });