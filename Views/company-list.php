<?php
use Utils\CustomSessionHandler as CustomSessionhandler;

$sessionHandler = new CustomSessionhandler();
?>
<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container text-white">
            <form action="<?php echo FRONT_ROOT ?>Company/GetByName" method="post" class="form-row">
                <div class="col-8">
                    <h2 class="text-white">Listado de Empresas</h2>
                </div>
                <div class="col">
                    <input class="form-control mr-sm-2" type="search" name="name" placeholder="Buscar por nombre..." aria-label="Search">
                </div>
                <div class="col">
                    <button class="btn btn-outline-success border-yellow my-2 my-sm-0" type="submit">Buscar</button>
                </div>
            </form>
            <div class="table-container overflow-auto">
                <table class="table bg-light-alpha">
                    <thead class='thead-dark'>
                        <?php if ($sessionHandler->isAdmin()) {
                        ?>
                            <th>ID</th>
                        <?php
                        }
                        ?>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($companiesList as $company) {
                            if ($company->getStatus() == true) {
                        ?>
                                <tr>
                                    <?php if ($sessionHandler->isAdmin()) {
                                    ?>
                                        <td><?php echo $company->getCompanyId() ?></td>
                                    <?php
                                    }
                                    ?>
                                    <td><?php echo $company->getName() ?></td>
                                    <td><?php echo $company->getEmail() ?></td>
                                    <td><?php echo $company->getPhone() ?></td>
                                    <td>
                                        <a href="<?php echo FRONT_ROOT ?>Company/ShowDetails/<?php echo $company->getCompanyId(); ?>" class="btn btn-yellow">Detalles</a>
                                        <?php if ($sessionHandler->isAdmin()) {
                                        ?>
                                            <a href="<?php echo FRONT_ROOT ?>Company/ShowModifyView/<?php echo $company->getCompanyId(); ?>" class="btn btn-yellow">Modificar</a>
                                            <a href="<?php echo FRONT_ROOT ?>Company/RemoveCompany/<?php echo $company->getCompanyId(); ?>" class="btn btn-danger" onclick="return confirm('Estas seguro de que quieres eliminar la empresa <?php echo $company->getName(); ?>?');">Eliminar</a>
                                    </td>
                                <?php
                                        }
                                ?>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
    <div class='list-nav'>
    <?php
    if ($sessionHandler->isStudent()) {
    ?>
        <a class="btn btn-secondary go-back" href="<?php echo FRONT_ROOT ?>Student/ShowDashboard">Regresar</a>
    <?php
    } else if ($sessionHandler->isAdmin()) {
    ?>
        <a class="btn btn-secondary go-back mr-2" href="<?php echo FRONT_ROOT ?>Admin/ShowDashboard">Regresar</a>
        <a class="btn btn-yellow" href="<?php echo FRONT_ROOT ?>Company/ShowAddView">Agregar</a>
    <?php
    }
    ?>
    </div>
</main>