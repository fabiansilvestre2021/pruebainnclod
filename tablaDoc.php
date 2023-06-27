<!DOCTYPE html>
<html>
<head>
    <title>Lista de Documentos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Lista de Documentos</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Contenido</th>
                    <th>ID Tipo</th>
                    <th>ID Proceso</th>
                    <th>Fecha de Creación</th>
                    <th>Fecha de Actualización</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $apiResponse = json_decode(file_get_contents('http://localhost:8000/api/doc_documento'), true);
                foreach ($apiResponse as $documento) {
                    echo "<tr>";
                    echo "<td>".$documento['DOC_ID']."</td>";
                    echo "<td>".$documento['DOC_NOMBRE']."</td>";
                    echo "<td>".$documento['DOC_CODIGO']."</td>";
                    echo "<td>".$documento['DOC_CONTENIDO']."</td>";
                    echo "<td>".$documento['DOC_ID_TIPO']."</td>";
                    echo "<td>".$documento['DOC_ID_PROCESO']."</td>";
                    echo "<td>".$documento['created_at']."</td>";
                    echo "<td>".$documento['updated_at']."</td>";
                    echo "<td>";
                    echo "<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#editarModal".$documento['DOC_ID']."'>Editar</button>";
                    echo "<a href='http://localhost:8000/api/doc_documento/".$documento['DOC_ID']."' class='btn btn-danger'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                    
                    // Modal para editar el documento
                    echo "<div class='modal fade' id='editarModal".$documento['DOC_ID']."' tabindex='-1' role='dialog' aria-labelledby='editarModalLabel".$documento['DOC_ID']."' aria-hidden='true'>";
                    echo "<div class='modal-dialog' role='document'>";
                    echo "<div class='modal-content'>";
                    echo "<div class='modal-header'>";
                    echo "<h5 class='modal-title' id='editarModalLabel".$documento['DOC_ID']."'>Editar Documento</h5>";
                    echo "<button type='button' class='close' data-dismiss='modal' aria-label='Close'>";
                    echo "<span aria-hidden='true'>&times;</span>";
                    echo "</button>";
                    echo "</div>";
                    echo "<div class='modal-body'>";
                    // Aquí puedes agregar los campos para editar el documento (por ejemplo, inputs, select, etc.)
                    echo "<form action='http://localhost:8000/api/doc_documento/".$documento['DOC_ID']."' method='POST'>";
                    echo "<label for='doc_nombre'>Nombre:</label>";
                    echo "<input type='text' name='DOC_NOMBRE' id='DOC_NOMBRE' value='".$documento['DOC_NOMBRE']."' required><br>";
                    echo "<label for='doc_codigo'>Código:</label>";
                    echo "<input type='text' name='DOC_CODIGO' id='DOC_CODIGO' value='".$documento['DOC_CODIGO']."' required><br>";
                    echo "<label for='doc_contenido'>Contenido:</label>";
                    echo "<textarea name='DOC_CONTENIDO' id='DOC_CONTENIDO' required>".$documento['DOC_CONTENIDO']."</textarea><br>";

                    echo "<div class='form-group'>
                    <label for='docIDTipo'>Tipo de Documento:</label>
                    <select class='form-control' id='DOC_ID_TIPO' name='DOC_ID_TIPO' onchange='document.getElementById(\'TipoPrefijo\').value=this.options[this.options.selectedIndex].id;' required>";

                    // Obtenemos los datos requeridos del API
                    $url = 'http://localhost:8000/api/tip_documento';
                    $response = file_get_contents($url);
                    $tiposDocumento = json_decode($response, true);
    
                    // Este procedimiento recorre los tipos de documento y crea las opciones del select
                    foreach ($tiposDocumento as $tipo) {
                        $tipID = $tipo['TIP_ID'];
                        $tipNombre = $tipo['TIP_NOMBRE'];
                        $tipPrefijo = $tipo['TIP_PREFIJO'];
                        echo "<option value='$tipID' id='DOC_ID_TIPO'>$tipNombre</option>";
                    }
                    
                    echo "</select>";
                    echo "<input type='hidden' id='TipoPrefijo' name='TipoPrefijo' value='TipoPrefijo' />";
                    echo "</div>";

                    echo "<div class='form-group'>
                    <label for='docIDProceso'>Proceso:</label>
    
                    <select class='form-control' id='DOC_ID_PROCESO' name='DOC_ID_PROCESO' onchange='document.getElementById(\"Proprefijo\").value=this.options[this.options.selectedIndex].id;' required>";

                    // Obtener los datos del API
                    $urlp = 'http://localhost:8000/api/pro_proceso';
                    $respon = file_get_contents($urlp);
                    $tipoProceso = json_decode($respon, true);
    
                    // Recorrer los tipos de documento y crear las opciones del select
                    foreach ($tipoProceso as $Pro) {
                        $ProId = $Pro['PRO_ID'];
                        $ProNombre = $Pro['PRO_NOMBRE'];
                        $ProPrefijo = $Pro['PRO_PREFIJO'];
                        echo "<option value='$ProId' id='DOC_ID_PROCESO'>$ProNombre</option>";
                    }
                    echo "</select>";
                    echo "<input type='hidden' id='Proprefijo' name='Proprefijo' value='Proprefijo' />";
    
                    // Generamos un campo oculto para el prefijo del proceso después de ser seleccionado 
                    if (isset($ProPrefijo)) {
                        echo "<input type='hidden' name='ProPrefijo' id='ProPrefijo' value='$ProPrefijo'>";
                    }
                    echo "</div>";

                    echo "<button type='submit' class='btn btn-primary'>Guardar cambios</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "<div class='modal-footer'>";
                    echo "<button type='button' class='btn btn-secondary' data-dismiss='modal'>Cerrar</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>