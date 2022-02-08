<?php
  $page_title = 'Agregar usuarios';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  include ('index.php');
?>
<?php
  if(isset($_POST['add_usuario'])){

   $req_fields = array('Id','Usuario','Contraseña','Nombre','Cel', 'Rol', 'FechaRegistro');
   validate_fields($req_fields);

   if(empty($errors)){
        $Id   = remove_junk($db->escape($_POST['Id']));
        $username   = remove_junk($db->escape($_POST['Usuario']));
        $password   = remove_junk($db->escape($_POST['Contraseña']));
        $nombre = remove_junk($db->escape($_POST['Nombre']));
        $celular   = remove_junk($db->escape($_POST['Cel']));
        $Fecha   = remove_junk($db->escape($_POST['FechaRegistro']));
        $Rol = (int)$db->escape($_POST['rol']);
        $password = sha1($password);
        $query = "INSERT INTO usuarios (";
        $query .="Id,Usuario, Contraseña, Nombre, Cel, Rol, FechaRegistro";
        $query .=") VALUES (";
        $query .=" '{$Id}', '{$username}','{$nombre}', '{$password}', '{$celular}', '{$Rol}', '{$Fecha}','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Cuenta de usuario ha sido creada");
          redirect('agregarUsu.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo crear la cuenta.');
          redirect('agregarUsu.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('agregarUsu.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Agregar usuario</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="agregarUsu.php.php">
            <div class="form-group">
                <label for="name">ID</label>
                <input type="number" class="form-control" name="Id" placeholder="Identificacion" required>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="Nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" name="Usuario" placeholder="Nombre de usuario">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name ="Contraseña"  placeholder="Contraseña">
            </div>
            <div class="form-group">
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
              <button type="submit" name="add_user" class="btn btn-primary">Guardar</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
