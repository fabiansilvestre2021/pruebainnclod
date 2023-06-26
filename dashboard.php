<!DOCTYPE html>
<html>
<head>
    <title>Registro de Documento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <h1>Registro de Documento</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Se obtienen los datos del formulario
            $docNombre = $_POST['docNombre'];
            $docCodigo = $_POST['tipPrefijo'] . "-" . $_POST['ProPrefijo']."-".rand(1, 1000);
            $docContenido = $_POST['docContenido'];
            $docIDTipo = $_POST['docIDTipo'];
            $docIDProceso = $_POST['docIDProceso'];

            //Se crea el objeto del documento
            $documento = array(
                'DOC_NOMBRE' => $docNombre,
                'DOC_CODIGO' => $docCodigo,
                'DOC_CONTENIDO' => $docContenido,
                'DOC_ID_TIPO' => $docIDTipo,
                'DOC_ID_PROCESO' => $docIDProceso
            );

            // Convertimos el objeto a formato JSON
            $jsonDocumento = json_encode($documento);

            // Se envia la solicitud al API
            $url = 'http://localhost:8000/api/doc_documento';
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDocumento);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            // Mostrar la respuesta del API
            // echo "<h2>Respuesta del API:</h2>";
            echo "<pre>" . $response . "</pre>";
        }
        ?>

        <form method="POST">

            <div class="form-group">
                <label for="docNombre">DOC_NOMBRE:</label>
                <input type="text" class="form-control" id="docNombre" name="docNombre" required>
            </div>
            <div class="form-group">
                <label for="docCodigo">DOC_CODIGO:</label>
                <input type="text" class="form-control" id="docCodigo" name="docCodigo" required>
            </div>
            <div class="form-group">
                <label for="docContenido">DOC_CONTENIDO:</label>
                <textarea class="form-control" id="docContenido" name="docContenido" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="docIDTipo">Tipo de Documento:</label>
                <select class="form-control" id="docIDTipo" name="docIDTipo" required>
                    <?php
                    // Obtenemos los dtaos requeridos  del API
                    $url = 'http://localhost:8000/api/tip_documento';
                    $response = file_get_contents($url);
                    $tiposDocumento = json_decode($response, true);

                    // este procedimiento es para correr los tipos de documento y crear las opciones del select
                    foreach ($tiposDocumento as $tipo) {
                        $tipID = $tipo['TIP_ID'];
                        $tipNombre = $tipo['TIP_NOMBRE'];
                        $tipPrefijo = $tipo['TIP_PREFIJO'];
                        "<input name='cajero' type='hidden' value='$tipPrefijo'>";
                        echo "<option value='$tipID'>$tipNombre</option>";
                    }
                    
                    ?>
                </select>
                <?php
                // Generamos un campo oculto para el prefijo del tipo de documento despues de ser seleccionado
                if (isset($tipPrefijo)) {
                    echo "<input type='hidden' name='tipPrefijo' id='tipPrefijo' value='$tipPrefijo'>";
                }
                ?>
            </div>

            <div class="form-group">
                <label for="docIDProceso">Proceso:</label>
                <select class="form-control" id="docIDProceso" name="docIDProceso" required>
                    <?php
                    // Obtener los datos del API
                    $urlp = 'http://localhost:8000/api/pro_proceso';
                    $respon = file_get_contents($urlp);
                    $tipoProceso = json_decode($respon, true);

                    // Recorrer los tipos de documento y crear las opciones del select
                    foreach ($tipoProceso as $Pro) {
                        $ProId = $Pro['PRO_ID'];
                        $ProNombre = $Pro['PRO_NOMBRE'];
                        $ProPrefijo = $Pro['PRO_PREFIJO'];
                        "<input name='cajero' type='hidden' value='$ProPrefijo'>";
                        echo "<option value='$ProId'>$ProNombre</option>";
                    }
                    ?>
                </select>
                <?php
                // Generamos un  campo oculto para el prefijo del proceso despues de ser seleccionado 
                if (isset($ProPrefijo)) {
                    echo "<input type='hidden' name='ProPrefijo' id='ProPrefijo' value='$ProPrefijo'>";
                }
                ?>
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Registrar Documento</button>

            
        </form>
    </div>

</body>
</html>