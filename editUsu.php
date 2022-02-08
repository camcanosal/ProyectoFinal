<?php
  $page_title = 'Editar Usuario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   include ('index.php');
?>
<?php
  if(isset($_POST['add_usuario'])){

   $req_fields = array('Id','Usuario','Nombre','Cel', 'Rol', 'FechaRegistro');
   validate_fields($req_fields);

   if(empty($errors)){
        $username   = remove_junk($db->escape($_POST['Usuario']));
        $nombre = remove_junk($db->escape($_POST['Nombre']));
        $celular   = remove_junk($db->escape($_POST['Cel']));
        $Fecha   = remove_junk($db->escape($_POST['FechaRegistro']));
        $Rol = (int)$db->escape($_POST['rol']);
        $password = sha1($password);
            $sql = "UPDATE usuarios SET Usuario ='{$username}', Nombre ='{$nombre}', Cel ='{$celular}', Rol='{$Rol}',FechaRegistro ='{$Fecha}', WHERE Id='{$db->escape($id)}'";
         $result = $db->query($sql);
          if($result && $db->affected_rows() === 1){
            $session->msg('s',"Acount Updated ");
            redirect('editUsu.php?id='.(int)$e_user['id'], false);
          } else {
            $session->msg('d',' Lo siento no se actualizó los datos.');
            redirect('editUsu.php.php?id='.(int)$e_user['id'], false);
          }
    } else {
      $session->msg("d", $errors);
      redirect('editUsu.php.php?id='.(int)$e_user['id'],false);
    }
  }
?>
<?php

?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
   <div class="col-md-12"> <?php echo display_msg($msg); ?> </div>
  <div class="col-md-6">
     <div class="panel panel-default">
       <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          Actualiza cuenta <?php echo remove_junk(ucwords($e_user['Usuario'])); ?>
        </strong>
       </div>
       <div class="panel-body">
          <form method="post" action="editUsu.php?id=<?php echo (int)$e_user['id'];?>" class="clearfix">
          <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="Nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" name="Usuario" placeholder="Nombre de usuario">
            </div>
            <<div class="form-group">
                <label for="name">Celular</label>
                <input type="number" class="form-control" name="Cel" placeholder="Numero de celular" required>
            </div>
            <div class="form-group">
              <label for="level">Rol de usuario</label>
                <select class="form-control" name="Rol">
                  <option value="0">Cliente</option>
                  <option value="1">Entrenador</option>
                  <option value="2">Administrador</option>
                </select>
            </div>
            <div class="form-group clearfix">
                    <button type="submit" name="update" class="btn btn-info">Actualizar</button>
            </div>
        </form>
       </div>
     </div>
  </div>
 </div>
<?php include_once('layouts/footer.php'); ?>