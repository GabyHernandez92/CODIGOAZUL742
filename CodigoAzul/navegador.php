<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="paginaPrincipal.php">   Sistema Código Azul</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php 
  
  session_start();
    if(isset($_SESSION["usuario"])){ //si hay un usuario logueado

      if (($_SESSION["tipo_usuario"])=="admin") { //si el tipo de usuario es admin?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">   
          <li class="nav-item active">
            <a class="nav-link active" href="vista_areas.php">Gestión de Áreas</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="vista_usuarios.php">Usuarios</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="vista_pacientes.php">Pacientes</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="vista_llamados.php">Llamados</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link active" href="reportes.php">Reportes</a>
          </li>
          <li class="nav-item active">
            <div class="derecha">
              <a class="nav-link active" href="cerrar_sesion.php">Cerrar sesión</a></span>
            </div>
           </li>   
        </ul>          

          </div>
        </form>
      </div>
      <?php
      } //end segundo if 
      else{ //el ipo_usuario es enfermero ?>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">     
            <li class="nav-item active">
              <a class="nav-link active" href="atencion.php"> Pacientes</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="atencion.php"> Llamados</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link active" href="atencion.php"> Reportes</a>
            </li>
          </ul>     
          <form class="form-inline">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">     
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <span style="float: right;"><a class="nav-link" href="cerrar_sesion.php"> Cerrar sesión </a></span>
                </li>       
              </ul>
            </div>
          </form>
          </div>
    <?php } //end primer else
    } //end primer if
    else { //no hay usuario logueado ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="formulario_registro.php"> Registrarse </a>
          </li>      
        </ul>     
      </div>
    <?php } //end segundo else ?>
</nav>