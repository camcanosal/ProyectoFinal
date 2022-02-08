<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('header.php', false);}
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