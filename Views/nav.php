<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand brand" href="#">
    <img src='<?php echo FRONT_ROOT ?>Views/img/utnmdp.png' />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowDashboard">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Empresas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Agregar Empresa</a>
          <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar Empresas</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Propuestas Laborales
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>JobOffer/ShowAddView">Agregar Propuesta</a>
          <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>JobOffer/ShowListView">Listar Propuestas</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Administradores
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/ShowAddView">Agregar Usuario Administrador</a>
          <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/ShowListView">Listar Usuarios</a>
          <a class="dropdown-item" href="<?php echo FRONT_ROOT ?>Admin/Remove">Eliminar Usuario</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Auth/Logout">Salir</a>
      </li>
    </ul>
  </div>
</nav>