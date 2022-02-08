<?php
  $page_title = 'Editar producto';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1,2);
   include ('index.php');
?>
<?php
 if(isset($_POST['plan'])){
    $req_fields = array('TipoPlan','Descripcion','Precio' );
    validate_fields($req_fields);

   if(empty($errors)){
    $plan_id  = remove_junk($db->escape($_POST['IdPlan']));
    $plan_name  = remove_junk($db->escape($_POST['TipoPlan']));
    $plan_desc   = remove_junk($db->escape($_POST['Descripcion']));
    $plan_precio   = remove_junk($db->escape($_POST['Precio']));
       $query   = "UPDATE plan SET";
       $query  .=" TipoPlan='{$plan_name}',";
       $query  .=" Descripcion ='{$plan_desc}', Precio ='{$plan_precio}'";
       $query  .=" WHERE IdPlan ='{$plan_id['IdPlan']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Producto ha sido actualizado. ");
                 redirect('product.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('edit_product.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('editPlan.php?id='.$plan['IdPlan'], false);
   }

 }

?>
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