<main class="py-5">
    <section id="listado" class="mb-5">
        <div class="container">            
            <h2 class="mb-4 text-white">Estado Académico</h2>
            <div class="card">
                    <table class="table bg-light-alpha text-black">
                        <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Legajo</th>
                            <th>Género</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $student->getFirstName() ?></td>
                                <td><?php echo $student->getLastName() ?></td>
                                <td><?php echo $student->getDni(); ?></td>
                                <td><?php echo $student->getFileNumber(); ?></td>
                                <td><?php echo $student->getGender(); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table bg-light-alpha">
                        <thead>
                            <tr>
                                <th>Nacimiento</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Carrera</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo substr($student->getBirthDate(), 0, 10); ?></td>
                                <td><?php echo $student->getEmail(); ?></td>
                                <td><?php echo $student->getPhoneNumber(); ?></td>
                                <td><?php echo $student->getCareer()->getDescription(); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <a class="btn btn-secondary mt-4" href="<?php echo FRONT_ROOT ?>Student/ShowDashboard">Regresar</a>
                </div>
        
    </section>
</main>