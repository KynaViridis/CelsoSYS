$(".btn-pri").on("click", function () {
    var selected_option = $('.select option:selected').val();

    switch (selected_option) {
        case '1':            
            window.location.href = window.location.href+"doc/procuracao.php";
        break;
        case '2':
            window.location.href = window.location.href+"doc/residencia.php";
        break;
        case '3':
            window.location.href = window.location.href+"doc/recibo.php";
        break;
        case '4':
            window.location.href = window.location.href+"doc/res282.php";
        break;
        case '5':
            window.location.href = window.location.href+"doc/des_venda.php";
        break;
        case '6':
            window.location.href = window.location.href+"doc/errata.php";
        break;
        case '7':
            window.location.href = window.location.href+"doc/segvia.php";
        break;
    }
});