<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "joaquin.reyes@colegioirerancagua.cl"; // Change this email to your //
$subject = "$m_subject :  $name";
$body = "Recibiste un correo desde pagina IRE \n\n"."Detalle:\n\nNombre: $name\n\n\nEmail: $email\n\nAsunto: $m_subject\n\nMensaje: $message";
$header = "Desde: $email";
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
