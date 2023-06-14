$('input[name="cpfa"]').mask('999.999.999-99');
$('input[name="cpfb"]').mask('999.999.999-99');
$('input[name="cep"]').mask('99999-999');

$(".havemail").change(function () {
    let valor = $(this).val();
    if(valor == 's'){
        $(".mail").fadeIn();
        $("#mail").prop('required',true);
    }else{
        $(".mail").fadeOut();
        $("#mail").prop('required',false);
    }
})

$(document).ready(function () {
    $('.mail').hide();
});