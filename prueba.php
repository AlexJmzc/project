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
        
        <input type="submit" value="Enviar">
    </form>

   </div>

   <?php
if ($puntaje != 0) {

    try {
    $insert_nota = "UPDATE `bookmark` SET `nota`=$puntaje WHERE `user_id`='$user_id' and `playlist_id`='$get_id'";
    $stmt = $conn->prepare($insert_nota);
    $stmt->execute();
        // Resto del código...
    } catch (PDOException $e) {
        echo "Error al ejecutar la consulta: " . $e->getMessage();
    }
echo "Tu puntaje actual es: " . $puntaje . "/" . count($preguntas);
}
?>


</section>

<!-- watch video section ends -->

<!-- comments section starts  -->


<!-- comments section ends -->


<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>