$('input[name="cep"]').mask('99999-999');


$(".cperr").change(function () {
    let valor = $(this).val();
    if(valor != 'dsb' && valor != 'Assinatura'){
        $(".crr").fadeIn();
        $(".input-crr").fadeIn();
        $(".input-crr").prop('required',true);
        $("#spn-crr").text(valor+" Correto");
        $(".input-crr").attr("placeholder",valor+" correto");
    }else{
        if(valor == 'Assinatura'){
            $("#spn-crr").fadeIn();
            $("#spn-crr").text("Será inserido um campo para assinatura correta");
            $(".input-crr").fadeOut();
            $(".input-crr").prop('required',false);
        }else{
            $(".crr").fadeOut();
            $(".input-crr").prop('required',false);
        }
    }

})

$(document).ready(function () {
    $('.crr').hide();
});