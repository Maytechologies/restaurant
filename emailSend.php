<?php



/* var_dump($datos);
exit; */

use PHPmailer\PHPmailer\PHPMailer;
use PHPmailer\PHPmailer\Exception;


require 'PHPmailer/Exception.php';
require 'PHPmailer/PHPMailer.php';
require 'PHPmailer/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {

    $datos = $_POST;

    var_dump($datos);

    //Server settings
    $mail->SMTPDebug = 2;                               //Enable verbose debug output
    $mail->isSMTP();                                    //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';               //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                           //Enable SMTP authentication
    $mail->Username   = 'staroffic@gmail.com';          //SMTP username
    $mail->Password   = 'kxrcfpyvssehreqe';                   //SMTP password
    $mail->SMTPSecure = 'tls';                          //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Correos Remitente / Destinatario
    $mail->setFrom('staroffic@gmail.com', 'Sitio Web PepiBurguer');
    $mail->addAddress($datos["email"]);
    $mail->addCC('staroffic@gmail.com', 'Correo Por Contacto de sitio Web');
 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = ($datos["asunto"]);
    $mail->Body    = ('<b>' .'Nombre del Cliente : '.'</b>'.$datos["nombre"]. '<b>'.' Telefono: '.'</b>'. $datos["telefono"].
                        '<br>' . '<b>'. 'Correo Electronico :  '.'</b>'. $datos["email"]. 
                        '<br>'.'<b>'. 'Mensaje : '. '</b>' . $datos["mensaje"] );
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Email envio correctamente';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

