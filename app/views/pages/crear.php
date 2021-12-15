<?php 

use App\controllers\formularios,
    App\controllers\usuarios;

$usuarios = new usuarios();

$formulario = new formularios();

$formulario->formularioCrearValidacion();



?>

<div class="container text-center font-weight-bold w-50">
  <h1>Crear Usuario</h1>
  <hr>
    <div class="container w-75 rounded p-3" style="background-color: gray;">
      <form method="post" action="">
        <div class="form-group">
          <label for="registroNombre">Nombre</label>
          <input type="name" class="form-control" id="nombre"  name="registroNombre"  placeholder="Escribe tu nombre" pattern="[A-Za-z]{1,50}" required>
        </div>

        <div class="form-group">
          <label for="registroEmail">Email address</label>
          <input type="email" class="form-control" id="email" name="registroEmail" placeholder="Escribe tu email">
        </div>

        <div class="form-group">
          <label for="registroTelefono">Telefono</label>
          <input type="phone" class="form-control" id="telefono" name="registroTelefono" placeholder="Escribe tu telefono">
        </div>

        <div class="form-group">
          <label for="registroCurp">CURP</label>
          <input type="curp" class="form-control" id="curp" name="registroCurp"  placeholder="Escribe tu CURP">
        </div>

        <div class="form-group">
          <label for="registroDireccion">Direccion</label>
          <input type="address" class="form-control" id="direccion" name="registroDireccion"  placeholder="Escribe tu direccion">
        </div>


        <button type="submit" class="btn btn-primary">Enviar</button>
      </form>
    </div>
</div>