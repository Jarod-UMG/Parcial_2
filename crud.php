<?php
     
     if( !empty($_POST) ){
        $txt_id = utf8_decode($_POST["txt_id"]);
        $txt_carne = utf8_decode($_POST["txt_carne"]);
        $txt_nombres = utf8_decode($_POST["txt_nombres"]);
        $txt_apellidos = utf8_decode($_POST["txt_apellidos"]);
        $txt_direccion = utf8_decode($_POST["txt_direccion"]);
        $txt_telefono = utf8_decode($_POST["txt_telefono"]);
        $drop_genero = utf8_decode($_POST["drop_genero"]);
        $txt_ce = utf8_decode($_POST["txt_ce"]);
        $txt_fn = utf8_decode($_POST["txt_fn"]);

      include("conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_agregar'])  ){
          $sql = "INSERT INTO estudiantes(carnet,nombres,apellidos,direccion,telefono,genero,email,fecha_nacimiento) VALUES ('". $txt_carne ."','". $txt_nombres ."','". $txt_apellidos ."','". $txt_direccion ."','". $txt_telefono ."',B'". $drop_genero ."','". $txt_ce ."','". $txt_fn ."');";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "update estudiantes set carnet='". $txt_carne ."',nombres='". $txt_nombres ."',apellidos='". $txt_apellidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',genero=B'". $drop_genero ."',email='". $txt_ce ."',fecha_nacimiento='". $txt_fn ." where id_estudiante = ". $txt_id.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "delete from estudiantes  where id_estudiante = ". $txt_id.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
            header('Location: /parcial_2');
           
          }else{
            $db_conexion->close();
          
          }

      }
     
    
      
      ?>