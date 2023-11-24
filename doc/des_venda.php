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
    $pdf->Text(90,65,'Declaração');
    $pdf->SetFont('Arial', '', 12);
    $text = "Para fins de documento (2ª VIA DO CRV), junto ao Departamento Estadual de Trânsito do estado do Paraná, DETRAN - PR, na 81ª Ciretran de Mandaguari, eu";
    $pdf->setY(75);
    $pdf->Multicell(185,6,$text);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(142,85,$_POST['a']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,92,'Portador do RG');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(42,92,$_POST['rga']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(68,92,'e CPF/CNPJ:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(95,92,$_POST['cpfa']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,100,'Ceclaro que DESISTO DA COMPRA DO VEÍCULO, de propriedade do');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(145,100,$_POST['b']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(11,106,'Com as características abaixo discriminadas.:');

    $pdf->Line(89,115,120,115);
    $pdf->Text(11,130,'Marca.................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(45,130,$_POST['marca']);
    $pdf->SetFont('Arial', '',  12);


    
    $pdf->Text(11,140,'Ano....................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(45,140,$_POST['year']);
    $pdf->SetFont('Arial', '',  12);

    
    $pdf->Text(11,150,'Cor....................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(45,150,$_POST['cor']);
    $pdf->SetFont('Arial', '',  12);

    
    $pdf->Text(11,160,'Tipo...................');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(45,160,$_POST['type']);
    $pdf->SetFont('Arial', '',  12);

    
    $pdf->Text(11,170,'Chassi..............');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(45,170,$_POST['chassi']);
    $pdf->SetFont('Arial', '',  12);

    
    $pdf->Text(100,130,'Combustível....');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(130,130,$_POST['comb']);
    $pdf->SetFont('Arial', '',  12);

    
    $pdf->Text(100,140,'Categoria.........');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(130,140,$_POST['cat']);
    $pdf->SetFont('Arial', '',  12);

    
    $pdf->Text(100,150,'Placa...............');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(130,150,$_POST['placa']);
    $pdf->SetFont('Arial', '',  12);

    
    $pdf->Text(100,160,'Renavam........');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(130,160,$_POST['renavam']);
    $pdf->SetFont('Arial', '',  12);

    $text = "E por ser expressão da verdade firmo a presente assumindo responsabilidade civil e criminal pelas informações acima prestadas";
    $pdf->setY(175);
    $pdf->Multicell(185,6,$text);

    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,280,'Local e Data:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(38,280,'Mandaguari,'.date("d").' de '.$mes[date("m")*1].' de '.date("Y"));

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Line(15,250,80,250);
    $pdf->Text(35,260,'Comprador');


    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Line(105,250,180,250);
    $pdf->Text(135,260,'Vendedor');

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
        <div style="margin-bottom: 50px; text-align: center; font-size: 25px;">Desistencia de venda</div>
        <form action="des_venda.php" method="post" target="_blank">
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
                <div class="input_pox">
                    <span>Nome Vendedor</span>
                    <input name="b" type="text" placeholder="Nome do Vendedor do veículo" required>
                </div>
            </div>
            <div class="title">Caracteristicas do veículo</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Marca</span>
                    <input name="marca" type="text" placeholder="Marca do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Ano</span>
                    <input name="year" type="text" placeholder="Ano do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Cor</span>
                    <input name="cor" type="text" placeholder="Cor do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Tipo</span>
                    <input name="type" type="text" placeholder="Tipo do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Chassi</span>
                    <input name="chassi" type="text" placeholder="Chassi do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Combustível</span>
                    <input name="comb" type="text" placeholder="Combustível do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Categoria</span>
                    <input name="cat" type="text" placeholder="Categoria do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Placa</span>
                    <input name="placa" type="text" placeholder="Placa do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Renavam</span>
                    <input name="renavam" type="text" placeholder="Renavam do veículo" required>
                </div>
            </div>

            <input class="button" style="height: 3%;" value="Imprimir PDF" type="submit">
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="../js/desvenda.js"></script>