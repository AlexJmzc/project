<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

if(isset($_GET['get_id'])){
   $get_id = $_GET['get_id'];
}else{
   $get_id = '';
   header('location:home.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Test de Conocimientos</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>

<!-- watch video section starts  -->

<section class="watch-video">
<?php
// Array de preguntas y respuestas
$preguntas = array(
    "1" => array(
        "pregunta" => "¿Qué es el phishing?",
        "respuestas" => array(
            "a" => "Un tipo de pesca deportiva.",
            "b" => "Un método para capturar información personal y financiera mediante la suplantación de identidad.",
            "c" => "Una técnica de jardinería para el cultivo de peces."
        ),
        "respuesta_correcta" => "b"
    ),
    "2" => array(
        "pregunta" => "¿Cuál de las siguientes acciones puede ayudar a prevenir el phishing?",
        "respuestas" => array(
            "a" => "Abrir todos los correos electrónicos recibidos sin verificar su origen.",
            "b" => "Hacer clic en enlaces sospechosos en correos electrónicos o mensajes desconocidos.",
            "c" => "Verificar la autenticidad de los remitentes y enlaces antes de proporcionar información personal o confidencial."
        ),
        "respuesta_correcta" => "c"
    ),
    "3" => array(
        "pregunta" => "¿Cuáles son algunas señales de advertencia comunes de un correo electrónico de phishing?",
        "respuestas" => array(
            "a" => "Errores de ortografía y gramática, remitente desconocido, solicitudes urgentes de información personal.",
            "b" => "Correo electrónico en blanco sin contenido.",
            "c" => "Correo electrónico de un amigo o familiar solicitando información personal."
        ),
        "respuesta_correcta" => "a"
    ),
    "4" => array(
        "pregunta" => "¿Qué debes hacer si sospechas que has recibido un correo electrónico de phishing?",
        "respuestas" => array(
            "a" => "Responder al correo electrónico proporcionando la información solicitada.",
            "b" => "Ignorar el correo electrónico y eliminarlo de inmediato.",
            "c" => "Informar el correo electrónico sospechoso a las autoridades o al departamento de seguridad de tu organización."
        ),
        "respuesta_correcta" => "c"
    ),
    "5" => array(
        "pregunta" => "¿Qué es la ingeniería social?",
        "respuestas" => array(
            "a" => "Un método para resolver problemas de ingeniería mediante la aplicación de principios sociales.",
            "b" => "Un método para manipular o engañar a las personas para obtener información confidencial.",
            "c" => "Un método para construir puentes y estructuras de ingeniería utilizando técnicas sociales."
        ),
        "respuesta_correcta" => "b"
    ),
    "6" => array(
        "pregunta" => "¿Cuál de las siguientes opciones es una buena práctica para la creación de contraseñas seguras?",
        "respuestas" => array(
            "a" => "Utilizar contraseñas cortas y sencillas que sean fáciles de recordar.",
            "b" => "Utilizar la misma contraseña para múltiples cuentas en línea.",
            "c" => "Utilizar contraseñas largas y complejas que incluyan letras mayúsculas, minúsculas, números y caracteres especiales."
        ),
        "respuesta_correcta" => "c"
    ),
    "7" => array(
        "pregunta" => "¿Cuál de las siguientes afirmaciones es verdadera sobre el almacenamiento de contraseñas?",
        "respuestas" => array(
            "a" => "Es seguro almacenar las contraseñas en un archivo de texto plano en el escritorio de tu computadora.",
            "b" => "Es seguro almacenar las contraseñas en un gestor de contraseñas con cifrado seguro.",
            "c" => "Es seguro enviar tus contraseñas por correo electrónico para almacenarlas en un servidor remoto."
        ),
        "respuesta_correcta" => "b"
    ),
    "8" => array(
        "pregunta" => "¿Cuál de las siguientes medidas de seguridad puede ayudar a prevenir el phishing?",
        "respuestas" => array(
            "a" => "Mantener el software y los sistemas operativos desactualizados.",
            "b" => "Abrir todos los correos electrónicos y hacer clic en los enlaces adjuntos sin verificar su origen.",
            "c" => "Verificar la autenticidad de los remitentes y enlaces antes de proporcionar información personal o confidencial."
        ),
        "respuesta_correcta" => "c"
    ),
    "9" => array(
        "pregunta" => "¿Qué es el vishing?",
        "respuestas" => array(
            "a" => "Un tipo de phishing que se realiza a través de mensajes de voz o llamadas telefónicas.",
            "b" => "Un tipo de phishing que se realiza a través de mensajes de texto (SMS).",
            "c" => "Un tipo de phishing que se realiza a través de redes sociales."
        ),
        "respuesta_correcta" => "a"
    ),
    "10" => array(
        "pregunta" => "¿Qué deberías hacer si sospechas que has sido víctima de un ataque de phishing?",
        "respuestas" => array(
            "a" => "Responder al correo electrónico proporcionando la información solicitada.",
            "b" => "Informar el incidente a las autoridades y a tu proveedor de servicios de correo electrónico.",
            "c" => "Ignorar la situación y esperar a ver si el problema se resuelve por sí solo."
        ),
        "respuesta_correcta" => "b"
    ),
    // Agrega más preguntas aquí...
);
$puntaje = 0;
// Procesar envío de formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $puntaje = 0;
    
    // Verificar las respuestas
    foreach ($preguntas as $id => $pregunta) {
        if (isset($_POST["pregunta_" . $id])) {
            $respuestaSeleccionada = $_POST["pregunta_" . $id];
            ?>
            <br>
            <?php
            if ($respuestaSeleccionada === $pregunta["respuesta_correcta"]) {
                $puntaje++;
            }
        }
    }
    

    // Puedes guardar el puntaje en una base de datos o hacer otras acciones aquí
}
?>

   <div class="video-details">
   <h1>Cuestionario</h1>
    
    <form method="post" action="">
        <?php foreach ($preguntas as $id => $pregunta): ?>
            <p><?php echo $pregunta["pregunta"]; ?></p>
            
            <?php foreach ($pregunta["respuestas"] as $respuestaId => $respuesta): ?>
                <input type="radio" name="pregunta_<?php echo $id; ?>" value="<?php echo $respuestaId; ?>">
                <label><?php echo $respuesta; ?></label><br>
            <?php endforeach; ?>
            
            <br>
        <?php endforeach; ?>
        
        <input type="submit" value="Enviar Respuestas">
    </form>
    <br>
    <?php
if ($puntaje >= 6) {

    try {
    $insert_nota = "UPDATE `bookmark` SET `nota`=$puntaje WHERE `user_id`='$user_id' and `playlist_id`='$get_id'";
    $stmt = $conn->prepare($insert_nota);
    $stmt->execute();

    $select_email = $conn->prepare("SELECT `email` FROM `users` WHERE id = '$user_id'");
    $select_email->execute();

    $resultados = $select_email->fetchAll(PDO::FETCH_ASSOC);

    $destinatario = '';
    if ($select_email->rowCount() > 0) {
        // Hay datos en $resultados
        // Realiza las operaciones que deseas con los datos
        foreach ($resultados as $row) {
            $destinatario = $row['email'];
            // Realiza alguna acción con el email obtenido
            echo "Email: " . $email;
        }
    } else {
        // No hay datos en $resultados
        echo "No se encontraron resultados.";
    }

   
    #$parametro = "bonny120700@gmail.com";

    $parametroEscapado = escapeshellarg($destinatario);


    // Comando para ejecutar el archivo Python con el parámetro
    $comando = "C:/Users/User/AppData/Local/Programs/Python/Python39/python.exe main.py $parametroEscapado";

    // Ejecuta el comando
    $resultado = shell_exec($comando);

   
    // Mensaje emergente
    $mensaje1 = "Has aprobado, las instrucciones para obtener tu certificado te llegarán a tu correo";

    echo "<script type='text/javascript'>alert('$mensaje1');</script>";

    
    $url = "home.php";
    echo "<meta http-equiv='refresh' content='0;URL=$url'>";
    
    exit;

    
    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . $e->getMessage();
    }
echo "<h2>Tu puntaje actual es: " . $puntaje . "/" . count($preguntas)."</h2>";
}else if($puntaje == 0){
    echo "<h2>no has seleccionado ninguna respuesta correcta aun</h2>";
}elseif($puntaje <= 5){
    echo "<h2>Tu puntaje es: " . $puntaje . "/" . count($preguntas)." tienes que rendir la evaluacion otra vez</h2>";
}
?>

   </div>




</section>

<!-- watch video section ends -->

<!-- comments section starts  -->


<!-- comments section ends -->


<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>