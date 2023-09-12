<?php
require('./normalizer.php');
if (!empty($_POST)) {
    date_default_timezone_set('America/Sao_Paulo');
    $pdf = new TextNormalizerFPDF('P', 'mm', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Image('../src/logo.png',50, 5, -500);
    $pdf->Text(55,52,'RECIBO DE VENDA DE VEÍCULO');
    $pdf->Line(10,60,200,60);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,70,'Nome do comprador');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(50,70,$_POST['a']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,80,'Endereço');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(30,80,$_POST['addr']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,90,'CPF');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(20,90,$_POST['cpfa']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(60,90,'RG');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(68,90,$_POST['rga']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,100,'Marca:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(25,100,$_POST['marca']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(60,100,'Ano/Mod. Fabricação');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(103,100,$_POST['ano']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,110,'Nº Cilindros');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(35,110,$_POST['cylinder']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(60,110,'Chassis');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(80,110,$_POST['chassis']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,120,'Cor');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(20,120,$_POST['cor']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(60,120,'Potência');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(80,120,$_POST['potency']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(120,120,'Placa');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(133,120,$_POST['placa']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,130,'Espécie');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(28,130,$_POST['especie']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(60,130,'Tipo');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(70,130,$_POST['tipo']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(120,130,'Valor');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(135,130,"R$ ".$_POST['valor']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,140,'Recebi a Importância de');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(60,140,"R$ ".$_POST['recebido']);

    $pdf->Line(50,145,150,145);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,155,'Nome do vendedor');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(50,155,$_POST['b']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,165,'Endereço');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(30,165,$_POST['addrb']);

    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,175,'CPF');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(20,175,$_POST['cpfb']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(65,175,'RG');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(74,175,$_POST['rgb']);

    $pdf->SetFont('Arial', '', 12);
    $text = "Em pagamento do veículo e de acordo com a discriminação acima, no estado em que se encontra e conforme foi examinado pelo comprador. A venda desse veículo, foi feita livre e desembaraçada de qualquer ônus, podendo o comprador transferir para seu nome o certificado de propriedade sem reserva de domínio. Para maior clareza, firmo o presente recibo.";
    $pdf->setY(180);
    $pdf->Multicell(185,5,$text);


    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,215,'Local e Data:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(40,215,'Mandaguari,'.date("d").' de '.$mes[date("m")*1].' de '.date("Y"));

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Line(50,235,160,235);
    $pdf->Text(80,245,'Assinatura do Vendedor');

    $pdf->Line(50,265,160,265);
    $pdf->Text(80,275,'Assinatura do Comprador');

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
        <div style="margin-bottom: 50px; text-align: center; font-size: 25px;">RECIBO DE VENDA DE VEÍCULO</div>
        <form action="recibo.php" method="post" target="_blank">
            <div class="title">Dados Do Comprador</div>
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
                <div class="input_pox">
                    <span>Endereço</span>
                    <input name="addr" type="text" placeholder="ex: Rua Padre Antonio Lock, 615, Centro" required>
                </div>
            </div>
            <div class="title">Dados Do Vendedor</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Nome</span>
                    <input type="text" name="b" placeholder="Nome" required>
                </div>
                <div class="input_pox">
                    <span>CPF</span>
                    <input name="cpfb" type="text" placeholder="CPF" required>
                </div>
                <div class="input_pox">
                    <span>RG</span>
                    <input name="rgb" type="text" placeholder="RG" required>
                </div>
                <div class="input_pox">
                    <span>Endereço</span>
                    <input name="addrb" type="text" placeholder="ex: Rua Padre Antonio Lock, 615, Centro" required>
                </div>
            </div>
            <div class="title">Dados Do Veículo</div>
            <div class="user_details">
            <div class="input_pox">
                    <span>Marca</span>
                    <input name="marca" type="text" placeholder="Marca do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Ano Fabricação</span>
                    <input name="ano" type="number" placeholder="Ano/Mod. Fabricação do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Nº Cilindros</span>
                    <input name="cylinder" type="number" placeholder="Nº de Cilindros do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Chassis</span>
                    <input name="chassis" type="text" placeholder="Chassis do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Placa</span>
                    <input name="placa" type="text" placeholder="Placa do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Cor</span>
                    <input name="cor" type="text" placeholder="Cor do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Potência</span>
                    <input name="potency" type="text" placeholder="Potência do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Espécie</span>
                    <input name="especie" type="text" placeholder="Espécie do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Tipo</span>
                    <input name="tipo" type="text" placeholder="Tipo do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Valor</span>
                    <input name="valor" type="text" placeholder="Valor do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Valor Recebido</span>
                    <input name="recebido" type="text" placeholder="Valor recebido" required>
                </div>
            </div>

            <input class="button" style="height: 3%;" value="Imprimir PDF" type="submit">
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="../js/recibo.js"></script>