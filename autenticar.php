<?php include_once('includes/load.php'); ?>
<?php
$req_fields = array('Usuario','Contraseña' );
validate_fields($req_fields);
$username = remove_junk($_POST['Usuario']);
$password = remove_junk($_POST['Contraseña']);

if(empty($errors)){
  $user_id = authenticate($username, $password);
  if($user_id){
    //create session with id
     $session->login($user_id);
    //Update Sign in time
     updateLastLogIn($user_id);
     $session->msg("s", "Bienvenido a GYM LCS.");
     redirect('.php',false);

  } else {
    $session->msg("d", "Nombre de usuario y/o contraseña incorrecto.");
    redirect('header.php',false);
  }

} else {
   $session->msg("d", $errors);
   redirect('index.php',false);
}

?>
