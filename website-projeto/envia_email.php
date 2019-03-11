<?php

header('Content-type: text/html; charset=utf-8');

// Conta de Email no servidor de hospedagem
define('SERVIDOR',  'admin@kyriosgrafica.com.br');

// Para onde serс enviado o contato
define('DESTINO', 'contato@kyriosgrafica.com.br');

// Identifica o site que foi enviada a mensagem
define('SITE', 'Kyrios Grсfica');

if (isset($_POST)):

$nome    = (isset($_POST['nome']))? $_POST['nome']: '';
$email   = (isset($_POST['email']))? $_POST['email']: '';
$telefone = (isset($_POST['telefone']))? $_POST['telefone']: '';
$msg    = (isset($_POST['mensagem']))? $_POST['mensagem']: '';

// Grava no banco de dados as informaчѕes do contato
$opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8');
$pdo = new PDO('mysql:host=localhost;dbname=bancosite', 'root', 'root', $opcoes);

$sql = "INSERT INTO contato (nome, email, telefone, mensagem)VALUES(?, ?, ?, ?)";
$stm = $pdo->prepare($sql);
$stm->bindValue(1, $nome);
$stm->bindValue(2, $email);
$stm->bindValue(3, $telefone);
$stm->bindValue(4, $msg);
$stm->execute();


$assunto = "Contato enviado pelo site " . SITE;


// Monta a mensagem do email
$mensagem = "Contato enviado pelo site ".SITE."\n";
$mensagem .= "**********************************************************\n";
$mensagem .= "Nome do Contato: ".$nome."\n";
$mensagem .= "E-mail do Contato: ".$email."\n";
$mensagem .= "**********************************************************\n";
$mensagem .= "Mensagem: \n".$msg."\n";

// Envia o e-mail e captura o retorno
$retorno = EnviaEmail(DESTINO, $assunto, $mensagem);

// Conforme o retorno da funчуo exibe a mensagem para o usuсrio
if ($retorno):
$array  = array('tipo' => 'alert alert-success', 'mensagem' => 'Sua mensagem foi enviada com sucesso!');
echo json_encode($array);
else:
$array  = array('tipo' => 'alert alert-danger', 'mensagem' => 'Infelizmente houve um erro ao enviar sua mensagem!');
echo json_encode($array);
endif;

endif;


// Funчуo para envio de e-mail usando a funчуo nativa do PHP mail()
function EnviaEmail($para, $assunto, $mensagem){
    
    $headers = "From: ".SERVIDOR."\n";
    $headers .= "Reply-To: $para\n";
    $headers .= "Subject: $assunto\n";
    $headers .= "Return-Path: ".SERVIDOR."\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\n";
    
    $retorno = mail($para, $assunto, nl2br($mensagem), $headers);
    return $retorno;
}
?>