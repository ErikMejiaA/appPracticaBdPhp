<!--Header-->
<?php 
    include_once __DIR__ . '../../../templates/header_listEstu.php';
?>
<!--Header-->

<!--Sidebar-->
<?php 
    include_once __DIR__ . '../../../templates/sidebar.php';
?>
<!--Sidebar-->

<!--Contenido-->
<section id="content">

    <!--navBarUno-->
    <?php 
        include_once __DIR__ . '../../../templates/navBarUno.php';
    ?>
    <!--navBarUno-->

    <!-- NAVBAR DOS -->
    <?php 
        include_once __DIR__ . '../../../templates/navBarDos.php';
    ?>
    <!-- NAVBAR DOS -->

    <!--Main, va a estar todo el cuerpo de la pagina-->
    <main>
        <section id="lstadoEstudiante">
            <h1 class="title text-center">*** LISTADO DE ESTUDIANTES PARA LA BASE DE DATOS CAMPUS-ESTUDIANTES ***</h1>
            <section id="listEstu">
                <div class="card">
                    <h5 class="card-header tex-center">**LISTA ESTUDIANTES**</h5>
                    <div class="card-body">
                        <?php 
                            //include_once __DIR__ . '/listEstudiante.php';
                            include_once __DIR__ . '/listEstudy.php';
                        ?>
                    </div>
                </div>
            </section>
        </section>

    </main>
    <!--Main-->
</section>
<!--Contenido-->

<!--Footer-->
<?php 
    include_once __DIR__ . '../../../templates/footer.php';
?>
<!--Footer-->