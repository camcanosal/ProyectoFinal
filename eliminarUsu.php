<?php
  require_once('includes/load.php');
  
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
  $delete_id = delete_by_id('Usuario',(int)$_GET['id']);
  if($delete_id){
      $session->msg("s","Usuario eliminado");
      redirect('usuario.php');
  } else {
      $session->msg("d","Se ha producido un error en la eliminación del usuario");
      redirect('usuario.php');
  }
?>
