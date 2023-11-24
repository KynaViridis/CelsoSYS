<?php
require('./normalizer.php');
if (!empty($_POST)) {
    date_default_timezone_set('America/Sao_Paulo');
    $pdf = new TextNormalizerFPDF('P', 'mm', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Image('../src/logo.png',55, 5, -500);
    $pdf->Line(10,45,200,45);
    $pdf->Text(30,65,'DECLARAÇÃO PARA CORREÇÃO DE ERROS NO C.R.V.');

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,90,'Eu, abaixo assinado');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(50,90,$_POST['a']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,100,'portador do RG nº');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(48,100,$_POST['rga']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(85,100,'CPF/CNPJ nº');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(115,100,$_POST['cpfa']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,110,'Proprietário do veículo de placa ');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(72,110,$_POST['placa']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(95,110,'Chassi');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(110,110,$_POST['chassi']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,120,'Ano de fab.');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(35,120,$_POST['year']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(46,120,',marca');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(62,120,$_POST['marca']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,130,'declaro que ao preencher o CRV, do veiculo aqui mencionado,');
    $pdf->Text(11,140,'cometi um erro no campo');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(62,140,$_POST['cperr']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,150,'sendo o correto:');

    if(empty($_POST['correct']) || $_POST['cperr'] == 'Assinatura'){
        $pdf->Line(45,175,150,175);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(85,182,"Asinatura"); 
        $pdf->SetFont('Arial', '', 12);
        $text= "Declaro ainda, que assumo total responsabilidade Civil e Criminal pelo mencionado acima, isentando o DETRAN-PR de quaisquer dúvidas ou problemas futuros que eventualmente possam surgir. ";
        $pdf->setY(195);
        $pdf->Multicell(185,5,$text);
    }else{
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(45,150,$_POST['correct']); 
        $pdf->SetFont('Arial', '', 12);
        $text= "Declaro ainda, que assumo total responsabilidade Civil e Criminal pelo mencionado acima, isentando o DETRAN-PR de quaisquer dúvidas ou problemas futuros que eventualmente possam surgir. ";
        $pdf->setY(160);
        $pdf->Multicell(185,5,$text);
    }


    


    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,280,'Local e Data:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(38,280,'Mandaguari,'.date("d").' de '.$mes[date("m")*1].' de '.date("Y"));


    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Line(105,250,180,250);
    $pdf->Text(100,260,'(Assinar e Reconhecer a Firma Verdadeira)');

    $pdf->Line(5,285,205,285);
    $pdf->SetFont('Arial', '', 8);
    $pdf->Text(10,290,'(44) 3233-1990 / (44) 99972-5654 / (44) 99928-7220 ');
    $pdf->Text(180,290,'PORT. 867/69');

    $pdf->Text(10,295,'despachantecelso@gmail.com');
    $pdf->Text(180,295,'MAT. 0847002-2');
    $pdf->Output();
}
?>

<link rel="stylesheet" href="../css/doc.css">
<body>
    <div class="container">
        <div style="margin-bottom: 50px; text-align: center; font-size: 25px;">DECLARAÇÃO PARA CORREÇÃO DE ERROS NO C.R.V.</div>
        <form action="errata.php" method="post" target="_blank">
            <div class="title">Dados Pessoa</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Nome</span>
                    <input type="text" name="a" placeholder="Nome" required>
                </div>
                <div class="input_pox">
                    <span>CPF/CNPJ</span>
                    <input name="cpfa" type="text" placeholder="CPF" required>
                </div>
                <div class="input_pox">
                    <span>RG</span>
                    <input name="rga" type="text" placeholder="RG" required>
                </div>
            </div>
            <div class="title">Dados Veículo / Errata</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Ano</span>
                    <input name="year" type="text" placeholder="Ano do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Chassi</span>
                    <input name="chassi" type="text" placeholder="Chassi do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Placa</span>
                    <input name="placa" type="text" placeholder="Placa do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Marca</span>
                    <input name="marca" type="text" placeholder="Marca do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Campo da errata</span>
                    <select name='cperr' class="cperr" required>
                        <option selected="true" value="dsb" disabled="disabled">Selecione</option>
                        <option value='Nome Do Comprador'>Nome do Comprador</option>
                        <option value='CPF / CNPJ'>CPF / CNPJ</option>
                        <option value='Endereço'>Endereço</option>
                        <option value='Local e Data'>Local e Data</option>
                        <option value='Assinatura'>Assinatura</option>
                        <option value=''></option>
                    </select>
                </div>
                <div class="input_pox crr">
                    <span id="spn-crr"></span>
                    <input class="input-crr" name="correct" type="text" placeholder="">
                </div>
            </div>

            <input class="button" style="height: 3%;" value="Imprimir PDF" type="submit">
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="../js/errata.js"></script>