<?php
require('./normalizer.php');
if (!empty($_POST)) {
    date_default_timezone_set('America/Sao_Paulo');
    $pdf = new TextNormalizerFPDF('P', 'mm', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Image('../src/logo.png',55, 5, -500);
    $pdf->Text(40,55,'RESOLUÇÃO 282 DE 26 DE JUNHO DE 2008');
    $pdf->Line(10,45,200,45);
    $pdf->Text(90,65,'Declaração');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,80,'Eu,');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(18,80,$_POST['a']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,85,'portador da carteira de identidade nº');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(80,85,$_POST['rga']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(105,85,', expedida por');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(133,85,$_POST['org']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,90,'CPF/CNPJ nº ');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(40,90,$_POST['cpfa']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,95,'Residente na ');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(36,95,$_POST['addr']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,100,'Município de');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(36,100,$_POST['cidade']);
    $pdf->SetFont('Arial', '',  12);
    $pdf->Text(65,100,', Estado do');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(90,100,$_POST['uf']);

    $pdf->setY(110);
    $pdf->setx(9);
    $pdf->SetFont('Arial', '', 12);
    $text= "De acordo como disposto nos incisos II do art. 4ª, III do art. 6ª e II do art. 10 da Resolução nº 2848, do CONTRAN, declaro que assumo a responsabilidade pela procedência lícita";
    $pdf->Multicell(185,5,$text);
    $pdf->Text(10,125,"do motor nº");
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(35,125,$_POST['nmot']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(70,125,", instalado no veículo de minha propriedade,");
    $pdf->Text(10,130,"marca/modelo, ");
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(40,130,$_POST['mmv']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,135,'Placa,');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(23,135,$_POST['placa']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(50,135,',chassi');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(65,135,$_POST['chassi']);

    $pdf->setY(145);
    $pdf->setX(9);
    $pdf->SetFont('Arial', '',12);
    $text = 'Declaro, ainda, serem verdadeiras as informações supracitadas, sujeitando-me às cominações dispostas no art. 299 do Código Penal Brasileiro.';
    $pdf->Multicell(185,5,$text);

    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,280,'Local e Data:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(38,280,'Mandaguari,'.date("d").' de '.$mes[date("m")*1].' de '.date("Y"));

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Line(50,250,160,250);
    $pdf->Text(80,260,'Assinatura do Requerente');

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
        <div style="margin-bottom: 50px; text-align: center; font-size: 25px;">RESOLUÇÃO 282 DE 26 DE JUNHO DE 2008</div>
        <form action="res282.php" method="post" target="_blank">
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
                    <span>Identidade - Carteira</span>
                    <input name="rga" type="text" placeholder="Nº da identidade" required>
                </div>
                <div class="input_pox">
                    <span>Orgão Expedidor</span>
                    <input name="org" type="text" placeholder="Orgão Expedidor" required>
                </div>
                <div class="input_pox">
                    <span>Endereço</span>
                    <input name="addr" type="text" placeholder="ex: R. padre antonio lock 615" required>
                </div>
                <div class="input_pox">
                    <span>Estado</span>
                    <input name="uf" type="text" placeholder="ex: Paraná" required>
                </div>
                <div class="input_pox">
                    <span>Município</span>
                    <input name="cidade" type="text" placeholder="ex: Mandaguari" required>
                </div>
            </div>
            <div class="title">Dados Veículo</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Nº Motor</span>
                    <input name="nmot" type="text" placeholder="Numero do Motor" required>
                </div>
                <div class="input_pox">
                    <span>Marca/Modelo</span>
                    <input name="mmv" type="text" placeholder="Marca / Modelo do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Placa</span>
                    <input name="placa" type="text" placeholder="Placa do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Chassi</span>
                    <input name="chassi" type="text" placeholder="Chassi do veículo" required>
                </div>
            </div>

            <input class="button" style="height: 3%;" value="Imprimir PDF" type="submit">
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="../js/res282.js"></script>