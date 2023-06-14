<?php
require('./normalizer.php');
if (!empty($_POST)) {
    date_default_timezone_set('America/Sao_Paulo');
    $pdf = new TextNormalizerFPDF('P','mm','A4');
    $pdf->SetAutoPageBreak(true,10);
	$pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 25);
    //$pdf->Image('../src/logo.png',10, 5, -950);
    $pdf->Text(10,10,'Procuração');
    $pdf->Line(10,18,190,18);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,25,'Outorgante:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(37,25, $_POST['a']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,35,'RG:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(20,35, $_POST['rga']);

    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(52,35,'CPF:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(64,35, $_POST['cpfa']);
        
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,45,'Endereço:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(32,45, $_POST['adra']);


    $pdf->Line(10,50,110,50);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,60,'Outorgado:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(35,60, $_POST['b']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,70,'RG:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(20,70, $_POST['rgb']);

    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(52,70,'CPF:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(64,70, $_POST['cpfb']);
        
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,80,'Endereço:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(32,80, $_POST['adrb']);

    $pdf->Line(10,85,110,85);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,92,'Poderes:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(30,92, 'PARA O FIM ESPECIAL DE, em nome do(a) outorgante, como se presente fosse, vender');
    $pdf->Text(10,98, 'ceder e transferir, a quem convier, inclusive em favor de si próprio, pelo preço e condições que ajustar,');
    $pdf->Text(10,104, 'o veículo de que é legitimo(a) proprietário(a), a seguir descriminado:');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,118,'Espécie/Tipo:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(40,118, $_POST['tipo']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(95,118,'Ano Fab:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(115,118, $_POST['fab']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(141,118,'Ano Modelo:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(168,118, $_POST['mod']);


    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,128,'Marca/Modelo:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(42,128, $_POST['marca']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(120,128,'Renavam:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(142,128, $_POST['renvam']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,138,'Placa:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(23,138, $_POST['placa']);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(52,138,'Combustivel:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(80,138, $_POST['combustivel']);
    
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(120,138,'Chassi:');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(137,138, $_POST['chassi']);

    $pdf->setY(145);
    $text= "Podendo para tanto, indicado procurador, ajustar e receber o preço; passar recibo e dar quitação; assinar o recibo de transferência do veículo; representá-lo(a) junto ao DETRAN, CIRETRAN e CONTRAN, nesta cidade e em todo território nacional, com a finalidade de requerer e acompanhar a transferência do descrito veículo em favor dele(a) outorgante; requerer, alegar e assinar o que for preciso; retirar documentos; prestar declarações, inclusive para retificação de dados pessoais, para retificação de erro ou rasura no preenchimento do recibo de transferência, ou ainda para esclarecimento de fatos de qualquer natureza que se faça necessário; firmar termos, compromissos e acordos; requerer a 2ª (segunda) via do Certificado de Registro de Propriedade do descrito veículo; retirar o certificado e demais documentos que se façam necessários; requerer e realizar a remarcação do chassi; representar o outorgante perante Delegacias de Polícia, Batalhões de Trânsito, Polícia Militar, Polícia Civil e demais órgãos legalmente instituídos, para requerer e retirar o dito veículo, se apreendido for, pagar as multas respectivas e quaisquer outras taxas e emolumentos; preencher e assinar Boletins de Ocorrência de Acidente de Trânsito, de furto ou de roubo do veículo; representá-lo(a) ainda perante o banco ou instituição financeira responsável arrendamento desse bem, perante o qual poderá desistir de seus direitos sobre esse leasing, indicando para quem deverá ser preenchido o respectivo recibo para sua transferência; bem como, se preciso for contratar advogado com os poderes da cláusula 'Ad-Judicia' e mais os de transigir, desistir, renunciar, receber, passar recibos, dar quitações, arrolar, ouvir e impugnar testemunhas, juntar, apresentar e retirar documentos e papéis em geral; substabelecer e praticar, afinal, os demais atos indispensáveis ao fim desta outorga. ";
    $pdf->Multicell(185,5,$text);

    $pdf->Line(10,275,80,275);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(35,280, 'Outorgante');

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(18,290, 'Mandaguari, PR., '.date("d/m/Y"));
    $pdf->Image('../src/logo.png',85,250,110);
   


    $pdf->Output();
}


?>

<link rel="stylesheet" href="../css/procuracao.css">

<body>
    <div class="container">
        <div style="margin-bottom: 50px; text-align: center; font-size: 25px;">Procuração</div>
        <form action="procuracao.php" method="post" target="_blank">
            <div class="title">Dados Outorgante</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Outorgante</span>
                    <input type="text" name="a" placeholder="Outorgante" required>
                </div>
                <div class="input_pox">
                    <span>RG</span>
                    <input name="rga" type="text" placeholder="RG do outorgante" required>
                </div>
                <div class="input_pox">
                    <span>CPF</span>
                    <input name="cpfa" type="text" placeholder="CPF do outorgante" required>
                </div>
                <div class="input_pox">
                    <span>Endereço</span>
                    <input name="adra" type="text" placeholder="Endereço do outorgante" required>
                </div>
                <div class="title" style="margin-top: 35px;">Dados Outorgado</div>
                <div class="user_details">
                    <div class="input_pox">
                        <span>Outorgado</span>
                        <input name="b" type="text" placeholder="Outorgante" required>
                    </div>
                    <div class="input_pox">
                        <span>RG</span>
                        <input name="rgb" type="text" placeholder="RG do outorgado" required>
                    </div>
                    <div class="input_pox">
                        <span>CPF</span>
                        <input name="cpfb" type="text" placeholder="CPF do outorgado" required>
                    </div>
                    <div class="input_pox">
                        <span>Endereço</span>
                        <input name="adrb" type="text" placeholder="Endereço do outorgado" required>
                    </div>

                    <div class="title" style="margin-top: 35px;">Dados Veículo</div>
                    <div class="user_details">
                        <div class="input_pox">
                            <span>Espécie/Tipo</span>
                            <input name="tipo" type="text" placeholder="Espécie/Tipo" required>
                        </div>
                        <div class="input_pox">
                            <span>Ano Fabricação</span>
                            <input name="fab" type="number" placeholder="Ano Fabricação" required>
                        </div>
                        <div class="input_pox">
                            <span>Ano Modelo</span>
                            <input name="mod" type="number" placeholder="Ano Modelo" required>
                        </div>
                        <div class="input_pox">
                            <span>Marca/Modelo</span>
                            <input name="marca" type="text" placeholder="Marca/Modelo" required>
                        </div>
                        <div class="input_pox">
                            <span>Renavam</span>
                            <input name="renvam" type="text" placeholder="Renavam" required>
                        </div>
                        <div class="input_pox">
                            <span>Placa</span>
                            <input name="placa" type="text" placeholder="Placa" required>
                        </div>
                        <div class="input_pox">
                            <span>Combustível</span>
                            <input name="combustivel" type="text" placeholder="Combustível" required>
                        </div>
                        <div class="input_pox">
                            <span>Chassi</span>
                            <input name="chassi" type="text" placeholder="Chassi" required>
                        </div>
                    </div>
                    <input class="button" value="Imprimir PDF" type="submit">
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="../js/procuracao.js"></script>