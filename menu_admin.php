<?php
  $page_title = 'Admin página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
   include ('index.php');
?>
<?php
 $c_plan     = count_by_id('plan');
 $c_compra       = count_by_id('compraPlan');
 $c_user          = count_by_id('usuarios');
 ?>
<?php include_once('layouts/header.php'); ?>
!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="imagenes/admin.png" type="image/x-icon">
    <meta name="description" content="LCS GYM es un centro de ejercicios para todas las edades y todos los objetivos para lograr vivir el día con energia. Animate al desafio de sentirse pleno.">

    <meta name="keywords" content="LCS GYM, gimnasio, ejercicio, salud, musculacion, cardio, fisica, aparatos, pesas, rendimiento, fuerza, rutinas, aerobico, funcional, peso, resistencia, tonificacion, musculatura, crossfit">

    <meta property="og:title" content="LCS GYM - Planes de ejercicios personalizados">
    <meta property="og:description" content="LCS GYM es un centro de ejercicios para todas las edades y todos los objetivos para lograr vivir el día con energia. Animate al desafio de sentirse pleno.">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    <title>LSCGYM - Planes de ejercicios personalizados</title>
</head>
<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Usuarios</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-list"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_plan['total']; ?> </h2>
          <p class="text-muted">Cantidad Planes</p>
        </div>
       </div>
    </div>
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue">
          <i class="glyphicon glyphicon-shopping-cart"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_compra['total']; ?> </h2>
          <p class="text-muted">Planes Adquiridos</p>
        </div>
       </div>
    </div>
  </div>



<?php include_once('layouts/footer.php'); ?>