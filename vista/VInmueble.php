<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <h5 class="table-title">
            Lista de Inmuebles
        </h5>
        <table id="DataTable" class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripcion</th>
                    <th>Categoria</th>
                    <th>Estado</th>
                    <td>
                        <button class="btn btn-block btn-primary btn-sm" onclick="MNuevoInmueble()">
                            <i class="fas fa-plus"></i>
                            Nuevo</button>
                    </td>
                </tr>
            </thead>
            <tbody>
                <?php
        $inmueble = ControladorInmueble::ctrInformacionInmueble();
        foreach ($inmueble as $value) {
        ?>
                <tr>
                    <td><?php echo $value["cod_item"]; ?></td>
                    <td><?php echo $value["desc_item"]; ?></td>
                    <td><?php echo $value["clasificacion"]; ?></td>
                    <?php
            if ($value["estado_item"] == 1) {
            ?>
                    <td><span class="badge badge-success">Disponible</span></td>
                    <?php
            } else {
            ?>
                    <td><span class="badge badge-danger">No disponible</span></td>
                    <?php
            }
            ?>

                    <td>
                        <div class="btn-group">
                            <button class="btn btn-sm btn-secondary"
                                onclick="MEditInmueble(<?php echo $value['id_item']; ?>)">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger"
                                onclick="MEliInmueble(<?php echo $value['id_item']; ?>)">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php
        }
        ?>
            </tbody>
        </table>

    </section>
</div>