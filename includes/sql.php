<?php
  require_once('includes/load.php');
  function find_all($table) {
    global $db;
    if(tableExists($table))
    {
      return find_by_sql("SELECT * FROM ".$db->escape($table));
    }
 }
 /*--------------------------------------------------------------*/
 /* Function for Perform queries
 /*--------------------------------------------------------------*/
 function find_by_sql($sql)
 {
   global $db;
   $result = $db->query($sql);
   $result_set = $db->while_loop($result);
  return $result_set;
 }
 /*--------------------------------------------------------------*/
 /*  Function for Find data from table by id
 /*--------------------------------------------------------------*/
 function find_by_id($table,$id)
 {
   global $db;
   $id = (int)$id;
     if(tableExists($table)){
           $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
           if($result = $db->fetch_assoc($sql))
             return $result;
           else
             return null;
      }
 }
 /*--------------------------------------------------------------*/
 /* Function for Delete data from table by id
 /*--------------------------------------------------------------*/
 function delete_by_id($table,$id)
 {
   global $db;
   if(tableExists($table))
    {
     $sql = "DELETE FROM ".$db->escape($table);
     $sql .= " WHERE id=". $db->escape($id);
     $sql .= " LIMIT 1";
     $db->query($sql);
     return ($db->affected_rows() === 1) ? true : false;
    }
 }
 /*--------------------------------------------------------------*/
 /* Function for Count id  By table name
 /*--------------------------------------------------------------*/
 
 function count_by_id($table){
   global $db;
   if(tableExists($table))
   {
     $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
     $result = $db->query($sql);
      return($db->fetch_assoc($result));
   }
 }
 /*--------------------------------------------------------------*/
 /* Determine if database table exists
 /*--------------------------------------------------------------*/
 function tableExists($table){
   global $db;
   $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
       if($table_exit) {
         if($db->num_rows($table_exit) > 0)
               return true;
          else
               return false;
       }
   }

  function authenticate($username='' , $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT ID,Usuario,Contraseña,Rol FROM usuarios WHERE Usuario ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['Contraseña'] ){
        return $user['ID'];
      }
    }
   return false;
  }
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('Usuario',$user_id);
        endif;
      }
    return $current_user;
  }

   function paginaRol($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['rol']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['rol'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('header.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['Rol'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('home.php', false);
        endif;

     }

     function join_plan_table(){
      global $db;
      $sql  =" SELECT p.IdPlan,p.TipoProducto,p.Descripcion,p.Precio";
     $sql  .=" FROM plan p";
     $sql  .=" LEFT JOIN compraPlan c ON c.IdPlan = p.idPlan";
     $sql  .=" ORDER BY p.IdPlan ASC";
     return find_by_sql($sql);
 
    }
   function TipoPlan($plan){
     global $db;
     $plan_name = remove_junk($db->escape($plan));
     $sql = "SELECT TipoPlan FROM plan WHERE TipoPlan like '%$plan_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  function infoTipoPlan($title){
    global $db;
    $sql  = "SELECT * FROM plan ";
    $sql .= " WHERE TipoPlan ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  function ActualizarPlan($plan_id){
    global $db;
    $id  = (int)$plan_id;
    $sql = "UPDATE plan  WHERE IdPlan = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }

 function planAdquirido($limit){
   global $db;
   $sql  = "SELECT p.TipoPlan, COUNT(c.IdPlan) AS SUM(c.IdCompra)";
   $sql .= " FROM compraPlan c";
   $sql .= " LEFT JOIN plan p ON p.IdPlan = c.IdPlan ";
   $sql .= " GROUP BY c.IdPlan";
   $sql .= " ORDER BY DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }

function reportePlanes($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT c.fechaCompra, p.tipoPlan,p.precio,";
  $sql .= "COUNT(c.IdPlan)";
  $sql .= "LEFT JOIN plan p ON c.IdPlan = p.IdPlan";
  $sql .= " WHERE c.fechaCompra BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(c.fechaCompra),p.TipoPlan";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}

function  reporUsuarios($year,$month){
  global $db;
  $sql  = "SELECT ID, Usuario, Nombre, cel, Rol";
  $sql .= " WHERE DATE_FORMAT(fechaRegistro, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( fechaRegistro,  '%e' )";
  return find_by_sql($sql);
}
?>
