<?php
  $page_title = 'Agregar Alumno';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  //page_require_level(1);
  //$groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_alumnos'])){

   //$req_fields = array('full-name','username','password','level' );
   //validate_fields($req_fields);

   if(empty($errors)){
      $matricula = remove_junk($db->escape($_POST['matricula']));
      $nombre   = remove_junk($db->escape($_POST['nombre']));
      $primerAp   = remove_junk($db->escape($_POST['ApellidoAp']));
      $SegundoAp   = remove_junk($db->escape($_POST['ApellidoAm']));
      $edad = (int) remove_junk($db->escape($_POST['edad']));
      $email   = remove_junk($db->escape($_POST['email']));
      $semestre   = remove_junk($db->escape($_POST['semestre']));
      $licenciatura   = $db->escape($_POST['licenciatura']);
      $activo   = $db->escape($_POST['activo']);
        $query = "INSERT INTO alumnos (";
        $query .="matricula,Nombre,primerAp,SegundoAp,edad,email,activo,Semestre,Licenciatura";
        $query .=") VALUES (";
    $query .=" '{$matricula}','{$nombre}','{$primerAp}','{$SegundoAp}','{$edad}','{$email}','{$activo}','{$semestre}','{$licenciatura}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s'," Se agrego correctamente el Alumno");
          redirect('add_alumnos.php', false);
        } else {
          //failed
          $session->msg('d',' No se pudo Agregar Alumno.');
          redirect('add_alumnos.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_alumnos.php',false);
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
          <span>Agregar Alumno</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_alumnos.php">
            <div class="form-group">
                <label for="matricua">Matricula</label>
                <input type="text" class="form-control" name="matricula" placeholder="Matricula" required>
            </div>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre completo" required>
            </div>
            <div class="form-group">
                <label for="apellidoAp">Apellido Paterno</label>
                <input type="text" class="form-control" name="ApellidoAp" placeholder="Apellido Paterno">
            </div>
            <div class="form-group">
                <label for="apellidoAm">Apellido Materno</label>
                <input type="text" class="form-control" name ="ApellidoAm"  placeholder="Apellido Materno">
            </div>
            <div class="form-group">
                <label for="edad">Edad</label>
                <input type="text" class="form-control" name ="edad"  placeholder="Edad">
            </div>
            <div class="form-group">
                <label for="semestre">Semestre</label>
                <input type="text" class="form-control" name ="semestre"  placeholder="Semestre">
            </div>

            <div class="form-group">
                <label for="name">Correo Electronico</label>
                <input type="email" class="form-control" name ="email"  placeholder="e-mail">
            </div>
            <div class="form-group">
              <label for="licenciatura">Licenciatura</label>
                <select class="form-control" name="licenciatura">
                  <option>Activo</option>
                   <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group">
              <label for="level">Activo</label>
                <select class="form-control" name="activo">
                   <option>Activo</option>
                   <option>Inactivo</option>
                </select>
            </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_alumnos" class="btn btn-primary">Guardar</button>
              <a href="alumnos.php" class="btn btn-default btn-danger">Cancelar</a>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>
