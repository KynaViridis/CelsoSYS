<?php
require('./normalizer.php');
if (!empty($_POST)) {
    date_default_timezone_set('America/Sao_Paulo');
    $pdf = new TextNormalizerFPDF('P', 'mm', 'A4');
    $pdf->SetAutoPageBreak(true, 10);
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Image('../src/logo.png',50, 5, -500);
    $pdf->Text(10,52,'DECLARAÇÃO DE RESIDÊNCIA PARA OS REQUERENTES QUE NÃO');
    $pdf->Text(35,60,'POSSUEM COMPROVANTE EM SEU NOME:');
    $pdf->Line(10,70,200,70);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,80,'Ilmo. Sr. Diretor Geral do DETRAN/PR');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,95,'Eu,');
    $pdf->Text(18,95,$_POST['a']);
    $pdf->Text(10,102,'Documento de identidade n.:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(65,102,$_POST['rga']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(98,102,'Órgão Expedidor:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(133,102,$_POST['org']);


    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,109,'CPF n.:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(26,109,$_POST['cpfa']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(70,109,'Nacionalidade:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(100,109,$_POST['nacionalidade']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,116,'Naturalidade:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(36,116,$_POST['naturalidade']);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(80,116,'Município:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(100,116,$_POST['cidade']);

    $pdf->setY(123);
    $pdf->SetFont('Arial', '', 12);
    $text= "Na ausência de documentos em nome próprio para comprovação de residência, DECLARO para os devidos fins, sob as penas da Lei, ser residente e domiciliado à (rua, av, tv, etc):";
    $pdf->Multicell(185,5,$text);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(10,140,$_POST['logradouro']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,147,'Comp:');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(24,147,$_POST['tipo']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(50,147,'CEP:');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(63,147,$_POST['cep']);

    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(88,147,'Cidade:');

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(105,147,$_POST['city'].'/PR');

    if($_POST['haveMail'] == 's'){
        $pdf->SetFont('Arial', '', 12);
        $pdf->Text(10,154,'Email :');
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(25,154,$_POST['mail']);
    }else{
        $pdf->SetFont('Arial', '', 12);
        $pdf->Text(10,154,'Email :');
    
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(25,154,'Não possuo E-Mail');
    }

    $pdf->setY(160);
    $pdf->setX(35);
    $pdf->SetFont('Arial', '', 9);
    $text = 'Declaro ainda, estar ciente de que a falsidade da presente declaração pode implicar na sanção penal prevista no Art. 299, do Código Penal, conforme transcrição abaixo:';
    $pdf->Multicell(125,5,$text);
    $pdf->setY(172);      
    $pdf->setX(35);  
    $text = '"Art. 299 - Omitir, em documento público ou particular, declaração que nele deveria constar, ou nele inserir ou fazer inserir declaração falsa ou diversa da que deveria ser escrita, com o fim de prejudicar direito, criar obrigação ou alterar a verdade sobre o fato juridicamente relevante."';
    $pdf->Multicell(125,5,$text);  
    $pdf->setY(195);      
    $pdf->setX(35);      
    $text = '"Pena: reclusão de 1 (um) a 5 (cinco) anos e multa, se o documento é público e reclusão de 1 (um) a 3 (três) anos, se o documento é particular"';
    $pdf->Multicell(125,5,$text);

    $mes = array('', 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    
    $pdf->SetFont('Arial', '', 12);
    $pdf->Text(10,215,'Local e Data:');
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Text(40,215,'Mandaguari,'.date("d").' de '.$mes[date("m")*1].' de '.date("Y"));

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Line(50,235,160,235);
    $pdf->Text(80,245,'Assinatura do Requerente');

    $pdf->Line(50,265,160,265);
    $pdf->Text(65,275,'Declaro que assinou em minha presença');

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
        <form action="residencia.php" method="post" target="_blank">
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
                <div class="input_pox">
                    <span>Marca</span>
                    <input name="marca" type="text" placeholder="Marca do veículo" required>
                </div>
                <div class="input_pox">
                    <span>Ano Fabricação</span>
                    <input name="ano" type="number" placeholder="Ano/Mod. Fabricação" required>
                </div>
                <div class="input_pox">
                    <span>Nº Cilindros</span>
                    <input name="cylinder" type="number" placeholder="Nº de Cilindros" required>
                </div>
                <div class="input_pox">
                    <span>Chassis</span>
                    <input name="chassis" type="text" placeholder="chassis" required>
                </div>
            </div>
            <div class="title" style="margin-top: 35px;">Dados Resiência</div>
            <div class="user_details">
                <div class="input_pox">
                    <span>Logradouro Completo</span>
                    <input name="logradouro" type="text" placeholder="ex: Rua Padre Antonio Lock, 615, Centro" required>
                </div>
                <div class="input_pox">
                    <span>CEP</span>
                    <input name="cep" type="text" placeholder="CEP" required>
                </div>
                <div class="input_pox">
                    <span>Cidade</span>
                    <input name="city" type="text" placeholder="Cidade" required>
                </div>
                <div class="input_pox">
                    <span>Tipo</span>
                    <input name="tipo" type="text" placeholder="Tipo de Residência" required>
                </div>
                <div class="input_pox">
                    <span>Possui Email?</span>
                    <select name='haveMail' class="havemail">
                        <option value='n' selected="true" disabled="disabled">Selecione</option>
                        <option value='s'>Sim</option>
                        <option value='n'>Não</option>
                    </select>
                </div>
                <div class="input_pox mail">
                    <span>Email</span>
                    <input id="mail" name="mail" type="text" placeholder="E-Mail">
                </div>
            </div>

            <input class="button" style="height: 3%;" value="Imprimir PDF" type="submit">
        </form>
    </div>
</body>

</html>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="../js/residencia.js"></script>