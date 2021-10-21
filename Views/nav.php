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
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Agregar Empresa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/ShowListView">Listar Empresas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Company/Remove">Eliminar Empresa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>JobPosition/ShowListView">Listar Propuestas</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Admin/ShowAddView">Agregar ADMIN</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo FRONT_ROOT ?>Auth/Logout">Salir</a>
      </li>
    </ul>
  </div>
</nav>