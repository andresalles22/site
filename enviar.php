<?php

// Destino - Email de destino da mensagem
$destino = 'teste@teste.com.br';
$cc = 'teste@teste.com.br';
//$destino = 'web@infomaxnet.com.br';

// Remetente - Deve ser um email valido do dominio
$remetente = "teste@teste.com.br";

// Assunto do email
$assunto = 'Consultoria Gratuita';

if($destino) {

	// Variaveis POST
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$telefone = $_POST['telefone'];


	// Monta o Corpo da Mensagem
	$conteudo .= "Um cliente deixou uma mensagem através do formulário 'Consultoria' <br/><br/>\n";

	$conteudo .= "<b>Nome</b>: $nome <br/>\n";
	$conteudo .= "<b>Email</b>: $email <br/>\n";
	$conteudo .= "<b>Telefone</b>: $telefone <br/>\n";


	$conteudo .= "<small style='color:#999'>Este é um email de envio automatico pelo site, que pode ser respondido diretamente para o cliente.</small>\n";

	// Seta os Headers
	$headers =  "From: $remetente" . "\r\n" .
    			"Reply-To: $email" . "\r\n" .
    			"Cc: $cc" . "\r\n" .
    			"Return-Path: $remetente" . "\r\n" .
    			"MIME-Version: 1.0" . "\r\n" .
    			"X-Priority: 3" . "\r\n" .
    			"Content-Type: text/html; charset=UTF-8" . "\r\n" .
    			"X-Mailer: PHP/" . phpversion();

	// Tenta enviar o email
	if (mail($destino, $assunto, $conteudo, $headers)) {

        header('HTTP/1.0 200');
		echo "Email enviado com sucesso!";

	} else {

        header('HTTP/1.0 500');
		echo "Falha no envio do Email!";
	}
} else {

    header('HTTP/1.0 500');
	echo "Falha no envio do Email!";
}

/* Fim */