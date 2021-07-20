<?php 

use App\controllers\formularios,
    App\controllers\usuarios;

$usuarios = new usuarios($_GET['id']);

$formulario = new formularios();

$formulario->formularioEditarValidacion();
 
?>

<div class="container text-center font-weight-bold w-50">
  <h1>Editar Usuario</h1>
  <hr>
    <div class="container w-75 rounded p-3" style="background-color: gray;">
      <form method="post" action="">
        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input type="name" class="form-control" id="nombre"  name="nombre" value="<?php echo $usuarios->__get('nombre') ?>" placeholder="Escribe tu nombre" pattern="[A-Za-z]{1,50}" required>
        </div>

        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email"  value="<?php echo $usuarios->__get('email') ?>" placeholder="Escribe tu email">
        </div>

        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="phone" class="form-control" id="telefono" name="telefono"  value="<?php echo $usuarios->__get('telefono') ?>" placeholder="Escribe tu telefono">
        </div>

        <div class="form-group">
          <label for="curp">CURP</label>
          <input type="curp" class="form-control" id="curp" name="curp"  value="<?php echo $usuarios->__get('curp') ?>" placeholder="Escribe tu CURP">
        </div>

        <div class="form-group">
          <label for="direccion">Direccion</label>
          <input type="address" class="form-control" id="direccion" name="direccion"  value="<?php echo $usuarios->__get('direccion') ?>" placeholder="Escribe tu direccion">
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
</div>