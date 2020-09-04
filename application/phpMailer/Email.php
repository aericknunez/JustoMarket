<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Email{


   static public function EnviarEmail($destinatario, $nombre_destinatario, $asunto = NULL, $plantilla = NULL){
   				// email destino / nombre destino, asunto. 1, registro, 2, compra, 3 en camino
if($asunto == 1) { 
    $titulo = 'GRACIAS POR REGISTRARSE';
}
if($asunto == 2){ // registro
    $titulo = 'GRACIAS POR SU COMPRA';
} 
if($asunto == 3){
     $titulo = 'SU ORDEN EST&Aacute EN CAMINO';
} 


$mail = new PHPMailer(true);

 $mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
	);
//Tell PHPMailer to use SMTP

    //Server settings
    $mail->SMTPDebug = false;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'mail.justomarket.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'no-reply@justomarket.com';                     // SMTP username
    $mail->Password   = 'caca007125-';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('no-reply@justomarket.com', 'Justo Market');
    $mail->addAddress($destinatario, $nombre_destinatario);     // Add a recipient


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $titulo;
    $mail->Body    = self::Registro($nombre_destinatario, $asunto, $titulo);


    if($mail->send()){
    	return TRUE;
    } else {
        return FALSE;
    }

}




static public function Registro($nombre_destinatario, $asunto, $titulo){

if($asunto == 1) { 
    $mesaje = $nombre_destinatario . " Gracias por ser parte de nuestra gran familia, queremos atenderle como usted se lo merece, si tiene alguna duda no dude en ponerse en contacto con nosotros";
}
if($asunto == 2){ // registro
     $mesaje = $nombre_destinatario . " Gracias con confiar en Justo Market, su pedido procederá a ser empacado, desinfectado para posteriormente ser entregado a su destino";
} 
if($asunto == 3){
     $mesaje = $nombre_destinatario . " Su pedido ha sido enviado a la dirección que nos proporcionó, en breve estará con usted. Muchas gracias por su preferencia, esperamos pronto volver a saber de usted.";
} 


return '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" style="margin: 0; padding: 0
">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<title></title>
<style type="text/css">
@media only screen and (min-device-width: 481px) {
div[id="main"] {
width: 480px !important;
}
}
</style>
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginheight="0" marginwidth="0" 
style="-webkit-font-smoothing: antialiased; width: 100% !important; -webkit-text-size-adjust: none; margin: 0; padding: 0">


<table cellpadding="0" cellspacing="0" border="0" valign="top" width="100%" align="center" style=" width:100%; max-width:480px;">
<tr>
<td valign="top" align="left" style=" word-break:normal; border-collapse:collapse; font-family: Helvetica, Arial, sans-serif; font-size:12px; line-height:18px; color:#555555;">
<center>
<div id="main">
<table class="header-root" width="100%" height="50" cellpadding="0" cellspacing="0" style="border: none; margin: 0px; border-collapse: collapse; padding: 0px; width: 100%; height: 50px;">
    <tbody valign="middle" style="border: none; margin: 0px; padding: 0px;">
        <tr height="20" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 20px;">
            <td colspan="3" height="20" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 20px;"></td>
        </tr>
        <tr valign="middle" style="border: none; margin: 0px; padding: 0px;">
            <td width="6.25%" valign="middle" style="border: none; margin: 0px; padding: 0px; width: 6.25%;"></td>
            <td valign="middle" style="border: none; margin: 0px; padding: 0px;">
                <a href="https://justomarket.com" style="border: none; margin: 0px; padding: 0px; text-decoration: none;"><img class="logo" src="https://justomarket.com/assets/Logo/logopequeno.png"
                        width="122" height="37" alt="" style="border: none; margin: 0px; padding: 0px; display: block; max-width: 100%; width: 122px; height: 37px;"></a>
            </td>
            <td width="6.25%" valign="middle" 
            style="border: none; margin: 0px; padding: 0px; width: 6.25%;"></td>
        </tr>
        <tr height="20" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 20px;">
            <td colspan="3" height="20" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 20px;"></td>
        </tr>
    </tbody>
</table>
<table class="title-subtitle-root" width="100%" cellpadding="0" cellspacing="0" style="border: none; margin: 0px; border-collapse: collapse; padding: 0px; width: 100%;">
    <tbody valign="middle" style="border: none; margin: 0px; padding: 0px;">
        <tr height="28" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 28px;">
            <td colspan="3" height="28" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 28px;"></td>
        </tr>
        <tr valign="middle" style="border: none; margin: 0px; padding: 0px;">
            <td width="6.25%" valign="middle" style="border: none; margin: 0px; padding: 0px; width: 6.25%;"></td>
            <td valign="middle" style="border: none; margin: 0px; padding: 0px;">
                <h2 class="font title-subtitle-title" align="center" style="border: none; margin: 0px; padding: 0px; font-family: Circular, Helvetica, Arial, sans-serif; text-decoration: none; color: rgb(85, 85, 85); font-size: 30px; font-weight: bold;          line-height: 45px; letter-spacing: -0.04em; text-align: center;">'
.$titulo.

                '</h2>
            </td>
            <td width="6.25%" valign="middle" style="border: none; margin: 0px; padding: 0px; width: 6.25%;"></td>
        </tr>
        <tr height="16" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 16px;">
            <td colspan="3" height="16" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 16px;"></td>
        </tr>
    </tbody>
</table>
<table class="text-root" width="100%" cellpadding="0" cellspacing="0" style="border: none; margin: 0px; border-collapse: collapse; padding: 0px; width: 100%;">
    <tbody valign="middle" style="border: none; margin: 0px; padding: 0px;">
        <tr valign="middle" style="border: none; margin: 0px; padding: 0px;">
            <td class="table-separator" width="6.25%" valign="middle" style="width: 6.25%; border: none; margin: 0px; padding: 0px;"></td>
            <td valign="middle" style="border: none; margin: 0px; padding: 0px;">
                <table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0px; padding: 0px">
                    <tbody>
                        <tr>
                            <td class="font text-paragraph" align="left" style="border: none; margin: 0px; padding: 0px 0px 5px; font-family: Circular, Helvetica, Arial, sans-serif; font-weight: 200; text-align: left; text-decoration: none; color: rgb(97, 100, 103); font-size: 14px; line-height: 20px;">
                                <center style="border: none; margin: 0px; padding: 0px;">
                                <br>
<center style="border: none; margin: 0px; padding: 0px;"></center>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0px; padding: 0px">
                    <tbody>
                        <tr>
                            <td class="font text-paragraph" align="left" style="border: none; margin: 0px; padding: 0px 0px 5px; font-family: Circular, Helvetica, Arial, sans-serif; font-weight: 200; text-align: left; text-decoration: none; color: rgb(97, 100, 103); font-size: 14px; line-height: 20px;">
                                <center style="border: none; margin: 0px; padding: 0px;">
                                '. $mesaje .' <br>

                                    <center style="border: none; margin: 0px; padding: 0px;"></center>
                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td class="table-separator" width="6.25%" valign="middle" style="width: 6.25%; border: none; margin: 0px; padding: 0px;"></td>
        </tr>
        <tr valign="middle" style="border: none; margin: 0px; padding: 0px;">
            <td colspan="3" class="text-padding" height="20" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 20px;"></td>
        </tr>
    </tbody>
</table>








<table class="text-root" width="100%" cellpadding="0" cellspacing="0" style="border: none; margin: 0px; border-collapse: collapse; padding: 0px; width: 100%;">
    <tbody valign="middle" style="border: none; margin: 0px; padding: 0px;">
        <tr valign="middle" style="border: none; margin: 0px; padding: 0px;">
            <td class="table-separator" width="6.25%" valign="middle" style="width: 6.25%; border: none; margin: 0px; padding: 0px;"></td>
            <td valign="middle" style="border: none; margin: 0px; padding: 0px;">
                <table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0px; padding: 0px">
                    <tbody>
                        <tr>
                            <td class="font text-paragraph" align="left" style="border: none; margin: 0px; padding: 0px 0px 5px; font-family: Circular, Helvetica, Arial, sans-serif; font-weight: 200; text-align: left; text-decoration: none; color: rgb(97, 100, 103); font-size: 14px; line-height: 20px;">
                                <center style="border: none; margin: 0px; padding: 0px;"><b align="left" style="border: none; margin: 0px; padding: 0px; font-family: Circular, &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; text-align: left; text-decoration: none; font-weight: bold;">

                                </b></center>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: 0px; padding: 0px">
                    <tbody>
                        <tr>
                            <td class="font text-paragraph" align="left" style="border: none; margin: 0px; padding: 0px 0px 5px; font-family: Circular, Helvetica, Arial, sans-serif; font-weight: 200; text-align: left; text-decoration: none; color: rgb(97, 100, 103); font-size: 14px; line-height: 20px;">
                                <center style="border: none; margin: 0px; padding: 0px;">

                        <h3>No olvides que puedes pagarnos contra entrega y con tarjeta de credito o débito</h3>

                                </center>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <td class="table-separator" width="6.25%" valign="middle" style="width: 6.25%; border: none; margin: 0px; padding: 0px;"></td>
        </tr>
        <tr valign="middle" style="border: none; margin: 0px; padding: 0px;">
            <td colspan="3" class="text-padding" height="20" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 20px;"></td>
        </tr>
    </tbody>
</table>


Este mensaje fué enviado el '. Fechas::FechaEscrita(date("d-m-Y")) .' a las'. date("H:i:s") .'


<table class="footer-padding-root" width="100%" cellpadding="0" cellspacing="0" style="border: none; margin: 0px; border-collapse: collapse; padding: 0px; width: 100%;">
    <tbody valign="middle" style="border: none; margin: 0px; padding: 0px;">
        <tr class="footer-padding" height="22" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 22px;">
            <td colspan="3" class="footer-padding" height="22" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 22px;"></td>
        </tr>
    </tbody>
</table>






<table class="footer-root" width="100%" cellpadding="0" cellspacing="0" bgcolor="#F7F7F7" style="border: none; margin: 0px; border-collapse: collapse; padding: 0px; width: 100%; background-color: rgb(247, 247, 247);  height: 150px;">
    <tbody valign="middle" style="border: none; margin: 0px; padding: 0px;">
        <tr class="footer-bottom-padding" height="25" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 25px;">
            <td colspan="3" class="footer-bottom-padding" height="25" valign="middle" style="border: none; margin: 0px; padding: 0px; height: 25px;"></td>
        </tr>
        
        <tr valign="middle" style="border: none; margin: 0px; padding: 0px;">
            <td valign="middle" style="border: none; margin: 0px; padding: 0px; width: 6.25%;"></td>
            <td valign="middle" style="border: none; margin: 0px; padding: 0px;"><img class="footer-logo" src="https://justomarket.com/assets/Logo/logopequeno.png"
                    width="77" height="23" alt="" style="border: none; margin: 0px; padding: 0px; display: block; max-width: 100%; width: 77px; height: 23px;"></td>
            <td valign="middle" style="border: none; margin: 0px; padding: 0px; width: 6.25%;"></td>
        </tr>



    </tbody>
</table>
<p> Tel&eacutefono
2421 0140 ||  
WhatsApp
(+503) 77343433</p>
<p>10a Avenida Norte, Barrio El Angel, # 1 - 2, Sonsonate, Sonsonate</p>
</div>
</center>
</td>
</tr>
</table>


</body>

</html>';

}







} // class
?>