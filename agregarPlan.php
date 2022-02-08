<?php
  $page_title = 'Agregar producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(0,1,2);
?>
<?php
 if(isset($_POST['add_plan'])){
   $req_fields = array('IdPlan','TipoPlan','Descripcion','Precio');
   validate_fields($req_fields);
   if(empty($errors)){
    $plan_id  = remove_junk($db->escape($_POST['IdPlan']));
     $plan_name  = remove_junk($db->escape($_POST['TipoPlan']));
     $plan_desc   = remove_junk($db->escape($_POST['Descripcion']));
     $plan_precio   = remove_junk($db->escape($_POST['Precio']));
     $query  = "INSERT INTO plan (";
     $query .=" IdPlan,TipoPlan,Descripcion,Precio";
     $query .=") VALUES (";
     $query .=" '{$plan_id}', '{$plan_name}', '{$plan_desc}', '{$plan_precio}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$plan_id}'";
     if($db->query($query)){
       $session->msg('s',"Producto agregado exitosamente. ");
       redirect('add_product.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('agregarPlan.php',false);
   }

 }

?>
<!DOCTYPE html>
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
<section class="carrusel-center">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="imagenes/god.jpg" class="d-block w-auto size-img" alt="Gimnasio 1">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/dayro.jpg" class="d-block w-auto size-img" alt="Gimnasio 2">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/perro.jpg" class="d-block w-auto size-img" alt="Gimnasio 3">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/god2.jpg" class="d-block w-auto size-img" alt="Gimnasio 4">
                </div>
                <div class="carousel-item">
                    <img src="imagenes/berr.jpg" class="d-block w-auto size-img" alt="Gimnasio 4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
  <div class="col-md-9">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Plan</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="agregarPlan.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="TipoPlan" placeholder="Nombre del Plan*">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="number" class="form-control" name="IdPlan" placeholder="Id Plan*">
                  </div>
                  <div class="col-md-6">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="Descripcion" placeholder="Descripcion*">
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="Precio" placeholder="Precio*">
                  </div>
                 </div>
              </div>
              <button type="submit" name="add_product" class="btn btn-danger">Agregar producto</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>