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
    }
});