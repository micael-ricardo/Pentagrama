
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