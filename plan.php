<?php
  $page_title = 'Lista de productos';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1,2);
  $plan = join_plan_table();
  include ('index.php');
?>
<?php include_once('layouts/header.php'); ?>
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
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Agragar plan</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">Id Plan</th>
                <th class="text-center" style="width: 10%;"> Tipo Plan </th>
                <th class="text-center" style="width: 10%;"> Descripcion </th>
                <th class="text-center" style="width: 10%;"> Precio</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($plan as $plan):?>
              <tr>
                <td> <?php echo remove_junk($plan['TipoPlan']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['IdPlan']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['Descripcion']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['Precio']); ?></td>>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="editPlan.php?id=<?php echo (int)$plan['IdPlan'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     <a href="eliminarPlan.php?id=<?php echo (int)$plan['IdPlan'];?>" class="btn btn-danger btn-xs"  title="Eliminar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>