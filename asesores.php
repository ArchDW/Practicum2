<?php
  $page_title = 'Tutores página de inicio';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  
   $alumnos = join_asesor2_table($_GET['id']);
   //$alumnos = join_asesor_table();
?>

<?php include_once('layouts/header.php');  ?>
	<div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         
        </div>
        <div class="panel-body">
          <table id="lookup" class="table table-bordered">
            <thead style="background-color: #3C85F5;color: white; font-weight: bold;">
              <tr>
                <th class="text-center">Matricula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Apellido Paterno</th>
                <th class="text-center">Apellido Materno</th>
                <th class="text-center">Edad</th>
                <th class="text-center">Licenciatura</th>
                <th class="text-center">Semestre</th>
                <th class="text-center">E-mail</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Retroalimentacón</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($alumnos as $alumnos):?>
              <tr>
                <td class="text-center"> <?php echo remove_junk($alumnos['matricula']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['nombre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['primerAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['SegundoAp']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['edad']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Licenciatura']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['Semestre']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['email']); ?></td>
                <td class="text-center"> <?php echo remove_junk($alumnos['activo']); ?></td>
                
                <td class="text-center">
                  <div class="btn-group">
                    <a href="*?id=<?php echo $alumnos['matricula'];?>" class="btn btn-info btn-xs"  title="Reporte" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-pencil"></span>
                    </a>
                    
                    <a href="*?id=<?php echo $alumnos['matricula'];?>" class="btn btn-danger btn-xs"  title="Bitacora" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-book"></span>
                    </a>

                    <a href="*?id=<?php echo $alumnos['matricula'];?>" class="btn btn-success btn-xs"  title="Retroalimentacón" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-plus"></span>
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