<?php

include 'components/connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php include 'components/user_header.php'; ?>



<section class="about">

   <div class="row">

      <div class="image">
         <img src="images/about-img.svg" alt="">
      </div>

      <div class="content">
         <h3>Sobre nosotros</h3>
         <p>"Nuestra empresa nace con la misión de promover la seguridad informática y proteger a individuos y organizaciones en un mundo digital cada vez más vulnerable.
            Nos apasiona ofrecer cursos de alta calidad, 
            desarrollados por expertos en seguridad, para empoderar a las personas y fortalecer sus habilidades en la protección de datos y la prevención de ciberataques.</p>
         <a href="courses.php" class="inline-btn">Nuestros cursos</a>
      </div>

   </div>
   
   <div class="box-container">

      <div class="box">
         <i class="fas fa-graduation-cap"></i>
         <div>
            <h3>Correo</h3>
            <span>secureu.courses@gmail.com</span>
         </div>
      </div>


   </div>
</section>



<?php include 'components/footer.php'; ?>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>