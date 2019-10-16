<?php
  $page_title = 'Lista de Alumnos';
  require_once('includes/load.php');
  $alumnos = join_alumnos_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_alumnos.php" class="btn btn-primary">Agragar Alumno</a>
         </div>
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
                <th class="text-center">Activo</th>
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
                    <a href="edit_alumno.php?id=<?php echo $alumnos['matricula'];?>" class="btn btn-info btn-xs"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    
                    <a href="delete_product.php?id=<?php echo $alumnos['matricula'];?>" class="btn btn-success btn-xs"  title="Activar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-ok"></span>
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
   <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        
        <script src="layouts/datatables/jquery.dataTables.js"></script>
        <script src="layouts/datatables/dataTables.bootstrap.js"></script>
        <script>
        $(document).ready(function() {
        var dataTable = $('#lookup').DataTable( {
          
         "language":  {
          "sProcessing":     "Procesando...",
          "sLengthMenu":     "Mostrar _MENU_ registros",
          "sZeroRecords":    "No se encontraron resultados",
          "sEmptyTable":     "Ningún dato disponible en esta tabla",
          "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix":    "",
          "sSearch":         "Buscar:",
          "sUrl":            "",
          "sInfoThousands":  ",",
          "sLoadingRecords": "Cargando...",
          "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        },

          "processing": true,
          "serverSide": true,
          "ajax":{
            url :"layouts/ajax-grid-data.php", // json datasource
            type: "post",  // method  , by default get
            error: function(){  // error handling
              $(".lookup-error").html("");
              $("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
              $("#lookup_processing").css("display","none");
              
            }
          }
        } );
      } );
        </script>
  <?php include_once('layouts/footer.php'); ?>
