<?php 
  
  use App\controllers\usuarios;

  $usuarios = new usuarios();

  $datos = $usuarios->getUsuarios();

?>


<a type="btn" class="btn btn-info float-right mb-3" href="crear">Crear usuario</a>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right mb-3" data-toggle="modal" data-target="#exampleModal">
  Crear usuario
</button>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">telefono</th>
      <th scope="col">CURP</th>
      <th scope="col">direccion</th>
      <th scope="col"></th> 
      <th scope="col"></th>


    </tr>
  </thead>
  <tbody>
    <?php foreach ($datos as $key => $value) { ?>
    
    <tr>

      <th scope="row"><?php echo $value['id'] ?></th>
      <td><?php echo $value['nombre'] ?></td>
      <td><?php echo $value['email'] ?></td>
      <td><?php echo $value['telefono'] ?></td>
      <td><?php echo $value['curp'] ?></td>
      <td><?php echo $value['direccion'] ?></td>
      <td>
        <div class="btn-group" role="group">
          <a type="button" class="btn btn-outline-warning" href="editar?id=<?php echo $value['id']?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
          </a>

          <a type="button" class="btn btn-outline-danger" href="eliminar?id=<?php echo $value['id'] ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
            </svg>
          </a>
        </div> 
      </td>

    </tr>
    
   <?php  }?>
  </tbody>
</table>


<!-- Modal crear usuario-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="container w-100">
            <form id="formCrearUsuario" method="post" action="">
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

              
              <div class="loader"  style="display: none; margin-left: 40%; width: 65px; height: 65px;"></div> 
              <div class="alert alert-success alerta mt-2" role="alert" style="display:none;">Los datos se guardaron correctamente.</div>

              <hr>
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>
      </div>
      </div>
    </div>
  </div>
</div>


