<?php
if(isset($_POST['email'])) {

    // Edita las dos líneas siguientes con tu dirección de correo y asunto personalizados

    $email_to = "
 hola@anemoidigital.com";

    $email_subject = "Consulta de Servicios";

    function died($error) {

        // si hay algún error, el formulario puede desplegar su mensaje de aviso

        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";

        echo "Detalle de los errores.<br /><br />";

        echo $error."<br /><br />";

        echo "Porfavor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }

    // Se valida que los campos del formulairo estén llenos

    if(!isset($_POST['name']) ||

        !isset($_POST['email']) ||

        !isset($_POST['subject']) ||

        !isset($_POST['phone']) ||

        !isset($_POST['message'])) {

        died('Lo sentimos pero parece haber un problema con los datos enviados.');

    }
 //En esta parte el valor "name" nos sirve para crear las variables que recolectaran la información de cada campo

    $name = $_POST['name']; // requerido

    $email = $_POST['email']; // requerido

    $subject = $_POST['subject']; // requerido

    $phone = $_POST['phone']; // requerido

    $message = $_POST['message']; // no requerido

    $error_message = "$error";

//En esta parte se verifica que la dirección de correo sea válida

   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

  if(!preg_match($email_exp,$email)) {

    $error_message .= 'La dirección de correo proporcionada no es válida.<br />';

  }

//En esta parte se validan las cadenas de texto

    $string_exp = "/^[A-Za-z .'-]+$/";

  if(!preg_match($string_exp,$nombre)) {

    $error_message .= 'El formato del nombre no es válido<br />';

  }

//A partir de aqui se contruye el cuerpo del mensaje tal y como llegará al correo

    $email_message = "Contenido del Mensaje.\n\n";



    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }



    $email_message .= "Nombre: ".clean_string($name)."\n";

    $email_message .= "E-Mail: ".clean_string($email)."\n";

    $email_message .= "Telefono: ".clean_string($phone)."\n";

    $email_message .= "Mensaje: ".clean_string($message)."\n";


//Se crean los encabezados del correo

$headers = 'From: '.$email."\r\n".

'Reply-To: '.$email."\r\n" .

'X-Mailer: PHP/' . phpversion();

@mail($email_to, $email_subject, $email_phone, $email_message, $headers);

?>



<!-- incluye aqui el mensaje de envio-->

<?php
echo "<script>alert('Gracias! Nos pondremos en contacto contigo a la brevedad'); location.href='index.html'</script>";
}

?>
