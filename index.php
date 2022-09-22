<!doctype html>
<html lang="en">
  <head>
    <title>Estudiantes</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>

  <body style="background-color:Silver">
  <body>
  <nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-opacity-150">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Jarod Mejía</a>
    </div>
  </nav>
</br>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal_estudiantes">Nuevo registro</button>
</br>
      <div class="modal fade" id="modal_estudiantes" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="Modalts" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="Modalts">Formulario Estudiantes</h5>
            </div>
            <div class="modal-body">
              <form action="crud.php" method="post" id="miformulario">

              <div class="mb-3">
                <label for="lbl_id" class="form-label"><b>ID</b></label>
                <input type="text" name="txt_id" id="txt_id" class="form-control" value="0"  readonly>
              </div>
              <div class="mb-3">
                <label for="lbl_carne" class="form-label"><b>carne</b></label>
                <input type="text" name="txt_carne" id="txt_carne" class="form-control" placeholder="Carne: E001" required pattern="[E][0-9]{3}">
              </div>
              <div class="mb-3">
                <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
                <input type="text" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombres: Nombre1 Nombres2" required>
              </div>
              <div class="mb-3">
                <label for="lbl_apellidos" class="form-label"><b>Apellidos</b></label>
                <input type="text" name="txt_apellidos" id="txt_apellidos" class="form-control" placeholder="Apellidos: Apellido1 Apellido2" required>
              </div>
              <div class="mb-3">
                <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
                <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Direccion: #casa calle avenida lugar" required>
              </div>
              <div class="mb-3">
                <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
                <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Telefono: 55552222" required>
              </div>
              <div class="mb-3">
                <label for="lbl_ce" class="form-label"><b>Genero</b></label>
                <select class="form-select" name="drop_genero" id="drop_genero">
                  <option value=0>Masculino</option>
                  <option value=1>Femenino</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="lbl_ce" class="form-label"><b>Correo electronico</b></label>
                <input type="text" name="txt_ce" id="txt_ce" class="form-control" placeholder="Correo electronico: hola@gmail.com" required>
              </div>
              <div class="mb-3">
              </div>
              <div class="mb-3">
                <label for="lbl_fn" class="form-label"><b>Fecha Nacimiento</b></label>
                <input type="date" name="txt_fn" id="txt_fn" class="form-control" placeholder="aaaa-mm-dd" required>
              </div>

              <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="btn_agregar" name="btn_agregar" value="Agregar">Agregar</button>
                    <button type="submit" class="btn btn-warning" id="btn_modificar" name="btn_modificar" value="Modificar">Modificar</button>
                    <button type="submit" class="btn btn-danger" id="btn_eliminar" name="btn_eliminar" value="Eliminar" onclick="borrar()">Eliminar</button>
              </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="limpiar()">Cerrar</button>
            </div>
          </div>
        </div>
      </div>

    </br>
    <table class="table table-striped table-dark table-responsive table-hover table-bordered">
      <thead>
        <tr>
          <th>Id</th>
          <th>Carnet</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Genero</th>
          <th>Correo Electronico</th>
          <th>Fecha de Nacimiento</th>
        </tr>
        </thead>
        <tbody id="tbl_estudiantes">
         <?php 
         include("conexion.php");
         $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
         $db_conexion -> real_query ("SELECT e.id_estudiante as id,e.carnet,e.nombres,e.apellidos,e.direccion,e.telefono,e.genero,e.email,e.fecha_nacimiento FROM estudiantes as e;");
        $resultado = $db_conexion -> use_result();
        while ($fila = $resultado ->fetch_assoc()){
          echo "<tr>";
          echo "<td>". $fila['id']."</td>";
          echo "<td>". $fila['carnet']."</td>";
          echo "<td>". $fila['nombres']."</td>";
          echo "<td>". $fila['apellidos']."</td>";
          echo "<td>". $fila['direccion']."</td>";
          echo "<td>". $fila['telefono']."</td>";
          echo "<td>". $fila['genero']."</td>";
          echo "<td>". $fila['email']."</td>";
          echo "<td>". $fila['fecha_nacimiento']."</td>";
          echo "</tr>";

        }
        $db_conexion ->close();
         ?>
        </tbody>
    </table> 
</div>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function limpiar(){
        $("#txt_id").val(0);
        $("#txt_carne").val('');
        $("#txt_nombres").val('');
        $("#txt_apellidos").val('');
        $("#txt_direccion").val('');
        $("#txt_telefono").val('');
        $("#txt_ce").val('');
        $("#txt_fn").val('');
        $("#drop_genero").val(0);
        
    }
    $('#tbl_estudiantes').on('click','tr td',function(evt){
        var target,id,idg,carne,nombres,apellidos,direccion,telefono,electronico,nacimiento;
        target = $(event.target);
        id = target.parent().find("td").eq(0).html();
        idg = target.parent().find("td").eq(6).html();
        carne = target.parent("tr").find("td").eq(1).html();
        nombres = target.parent("tr").find("td").eq(2).html();
        apellidos =  target.parent("tr").find("td").eq(3).html();
        direccion = target.parent("tr").find("td").eq(4).html();
        telefono = target.parent("tr").find("td").eq(5).html();
        electronico = target.parent("tr").find("td").eq(7).html();
        nacimiento  = target.parent("tr").find("td").eq(8).html();
        $("#txt_id").val(id);
        $("#txt_carne").val(carne);
        $("#txt_nombres").val(nombres);
        $("#txt_apellidos").val(apellidos);
        $("#txt_direccion").val(direccion);
        $("#txt_telefono").val(telefono);
        $("#txt_ce").val(electronico);
        $("#txt_fn").val(nacimiento);
        $("#drop_genero").val(idg);
        $("#modal_estudiantes").modal('show');
    });

    function borrar() {
           var form = document.getElementById('miformulario');
           form.addEventListener('submit', function(event) {
             if (!confirm('Realmente desea eliminar el registro?')) {
               event.preventDefault();
             }
           }, false);
         };
</script>
  </body>
</html>