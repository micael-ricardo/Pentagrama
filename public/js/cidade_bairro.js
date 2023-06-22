
// Inserir required caso o campo esteja esposto
$(document).ready(function () {
    var $checkbox = $('#cadastrarbairro');
    $checkbox.click(function () {
        if ($checkbox.is(':checked')) {
            $('#nome_bairro').attr('required', true);
        } else {
            $('#nome_bairro').removeAttr('required');
        }
    });
});
$(document).ready(function () {
    var $checkbox = $('#cadastrarcep');
    $checkbox.click(function () {
        if ($checkbox.is(':checked')) {
            $('#cep, #rua').attr('required', true);
        } else {
            $('#cep, #rua').removeAttr('required');
        }
    });
});

// Inserir select2 + chamar APIs
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
            $('#nome_cidade').val(data.nome);
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
                        // console.log(data);
                        var results = [];
                        $.each(data, function (index, item) {
                            if (item.address.suburb) {
                                results.push({
                                    id: item.address.suburb,
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

// Chamar API via Cep + validar se o cep corresponde ao bairro
$(document).ready(function () {
    $('#cep').on('blur', function () {
        var cep = $(this).val();
        cep = cep.replace(/\D/g, '');
        if (cep.length === 8) {
            $.ajax({
                url: 'https://viacep.com.br/ws/' + cep + '/json/',
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (!data.erro) {
                        var logradouro = data.logradouro;
                        var bairro = data.bairro;

                        // Verifique se o bairro retornado corresponde ao bairro selecionado
                        if (bairro === $('#nome_bairro').val()) {
                            $('#rua').val(logradouro);
                        } else {
                            toastr.error('O CEP não corresponde ao bairro.');
                        }
                    }
                },
                error: function () {
                    toastr.error('Erro na consulta ao ViaCEP');
                }
            });
        }
    });
});

// Limpar campos caso alterados depois de preenchidos
$('#nome').on('change', function () {
    $('#nome_bairro').val('');
    $('#cep').val('');
    $('#rua').val('');
});
$('#nome_bairro').on('change', function () {
    $('#cep').val('');
    $('#rua').val('');
});
