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
    $pdf->Text(30,65,'Solicitação de 2ª Via');

    $pdf->SetFont('Arial', '', 12);
    $text = "Nos termos da ORDEM DE SERVIÇO nº. 007/97 - COOVE-DG, datada de 21 de março de 1997, solicito ao DETRAN/PR, a emissão de 2ª Via do Certificado de Registro do veículo abaixo, assumindo total responsabilidade.";
    $pdf->setY(90);
    $pdf->Multicell(185,5,$text);
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,120,'A solicitação é por................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,120,$_POST['solicitacao']);
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,130,'Placa....................................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,130,$_POST['placa']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,140,'Renavam.............................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,140,$_POST['renavam']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,150,'Chassis...............................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,150,$_POST['chassi']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,160,'Município de Emplacamento');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,160,$_POST['cidade']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,170,'Marca/Modelo......................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,170,$_POST['marca']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,180,'Ano de Fabricação/Modelo');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,180,$_POST['ano']);

    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,280,'Local e Data:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(38,280,'Mandaguari,'.date("d").' de '.$mes[date("m")*1].' de '.date("Y"));


    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Line(40,250,175,250);
    $pdf->Text(65,260,'Reconhecimento de Firma do Proprietário');
    $pdf->SetFont('Arial', '', 12);
    $text = 'RG '.$_POST['rga'].'     CPF '.$_POST['cpfa'];
    $pdf->Text(65,270, $text);

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
        <div style="margin-bottom: 50px; text-align: center; font-size: 25px;">SOLICITAÇÃO DE 2ª VIA</div>
        <form action="segvia.php" method="post" target="_blank">
            <div class="title">Dados Pessoa</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Nome</span>
                    <input type="text" name="a" placeholder="Nome" required>
                </div>
                <div class="input_pox">
                    <span>CPF</span>
                    <input name="cpfa" type="text" placeholder="CPF" required>
                </div>
                <div class="input_pox">
                    <span>RG</span>
                    <input name="rga" type="text" placeholder="RG" required>
                </div>
            </div>
            <div class="title">Dados Veículo / Solicitação</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Renavam</span>
                    <input name="renavam" type="text" placeholder="Renavam do veículo" required>
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
                    <span>Marca / Modelo</span>
                    <input name="marca" type="text" placeholder="Marca do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Município de Emplacamento</span>
                    <input name="cidade" type="text" placeholder="Município de Emplacamento do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Ano de Fabricação/Modelo</span>
                    <input name="ano" type="text" placeholder="Ano de Fabricação/Modelo do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Tipo de solicitação</span>
                    <input name="solicitacao" type="text" placeholder="ex: extravio, dilaceração ou furto" required>
                </div>
            </div>

            <input class="button" style="height: 3%;" value="Imprimir PDF" type="submit">
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="../js/segvia.js"></script>