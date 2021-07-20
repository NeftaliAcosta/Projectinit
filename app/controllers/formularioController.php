<?php 

  namespace App\controllers;

  use App\controllers\usuarios;

  class formularios {
    

    public function formularioEditarValidacion(){
        $usuarios = new usuarios($_GET['id']);

        if(!empty($_POST)){
        
        $campos = array();

        if(isset($_POST['nombre'])){
          
          if(empty($_POST['nombre'])){
            array_push($campos, "El campo nombre esta vacio.");

          }else{
            $usuarios->setNombre($_POST['nombre']);

          }

          if(empty($_POST['email'])){
            array_push($campos, "El campo email esta vacio.");

          }else{
            $usuarios->setEmail($_POST['email']);
          }

          if(empty($_POST['telefono'])){
            array_push($campos, "El campo telefono esta vacio.");

          }else{
            $usuarios->setTelefono($_POST['telefono']);
          }

          if(empty($_POST['curp'])){
            array_push($campos, "El campo curp esta vacio.");

          }else{

            $usuarios->setCurp($_POST['curp']);
          }

          if(empty($_POST['direccion'])){
            array_push($campos, "El campo direccion esta vacio.");

          }else{
            $usuarios->setDireccion($_POST['direccion']);
          }

          /*Con esta condicion se determina si existen algun datos en la variable campo entonces
          * Depligara los errores que tienen el formulario. de lo contrario se guardaran las respuestas
          * y notificara al usuario que sus datos se guardaron con exito.
          */

          if(count($campos) > 0){
            echo '<div class="alert alert-danger" role="alert">';
              for($i = 0; $i < count($campos); $i++){
                echo "<li>".$campos[$i]."</li>";
              } 
            echo '</div>';
          }else{
            
            $resp = $usuarios->save();

            /**Esta condicion enviara una alerta que los datos se guardaron correctamente.
             * Ademas tiene una script que limpia el historial y redirige a al tabla luego de 3 segs*/
            
            if($resp){
              echo '<div class="alert alert-success" role="alert">
                    Los datos se guardaron correctamente.
                  </div>';

              echo '<script>
                  setTimeout(function(){ 
                    if (window.history.replaceState){
                      window.history.replaceState(null, null, window.location.href);
                    }

                    window.location = "crud";

                   }, 3000);
                  </script>';
            }
          }
        }  
      }
    }

    public function formularioCrearValidacion(){
      $usuarios = new usuarios();

      if(!empty($_POST)){
        
        $campos = array();

        if(isset($_POST['registroNombre'])){
          
          if(!empty($_POST['registroNombre'])){
            $usuarios->setNombre($_POST['registroNombre']);

          }else{
            array_push($campos, "El campo nombre esta vacio.");

          }

          if(empty($_POST['registroEmail'])){
            array_push($campos, "El campo email esta vacio.");

          }else{
            $usuarios->setEmail($_POST['registroEmail']);
          }

          if(empty($_POST['registroTelefono'])){
            array_push($campos, "El campo telefono esta vacio.");

          }else{
            $usuarios->setTelefono($_POST['registroTelefono']);
          }

          if(empty($_POST['registroCurp'])){
            array_push($campos, "El campo curp esta vacio.");

          }else{

            $usuarios->setCurp($_POST['registroCurp']);
          }

          if(empty($_POST['registroDireccion'])){
            array_push($campos, "El campo direccion esta vacio.");

          }else{
            $usuarios->setDireccion($_POST['registroDireccion']);
          }

          /*Con esta condicion se determina si existen algun datos en la variable campo entonces
          * Depligara los errores que tienen el formulario. de lo contrario se guardaran las respuestas
          * y notificara al usuario que sus datos se guardaron con exito.
          */

          if(count($campos) > 0){
            echo '<div class="alert alert-danger" role="alert">';
              for($i = 0; $i < count($campos); $i++){
                echo "<li>".$campos[$i]."</li>";
              } 
            echo '</div>';
          }else{
            
            $resp = $usuarios->crear();

            /**Esta condicion enviara una alerta que los datos se guardaron correctamente.
             * Ademas tiene una script que limpia el historial y redirige a al tabla luego de 3 segs*/
            
            if($resp){
              echo '<div class="alert alert-success" role="alert">
                    Los datos se guardaron correctamente.
                  </div>';

              
            }
          }
        }  
      }
    }
  }
  
?>