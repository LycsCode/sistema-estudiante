<?php

include("conexion.php");

$buscar = trim($_GET["buscar"] ?? "");
$asignatura = trim($_GET["asignatura"] ?? "");

$sql = "SELECT * FROM personal WHERE 1=1";
$parametros = [];
$tipos = "";

if ($buscar !== "") {
    $sql .= " AND (Nombre LIKE ? OR Correo LIKE ?)";

    $criterio = "%" . $buscar . "%";

    $parametros[] = $criterio;
    $parametros[] = $criterio;

    $tipos .= "ss";
}

if ($asignatura !== "") {
    $sql .= " AND Asignatura = ?";

    $parametros[] = $asignatura;

    $tipos .= "s";
}

$sql .= " ORDER BY Nombre ASC";

$consulta = $conexion->prepare($sql);

if (!$consulta) {
    die("Error al preparar la consulta.");
}

if (!empty($parametros)) {
    $consulta->bind_param($tipos, ...$parametros);
}

if (!$consulta->execute()) {
    die("Error al consultar los estudiantes.");
}

$resultado = $consulta->get_result();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Lista de Estudiantes</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
    <script src="js/app.js" defer></script>

</head>

<body>

    <div class="container mt-5 mb-5">

        <div class="card formulario p-4 shadow">

            <h1 class="titulo text-center mb-4 text-white">
                Lista de Estudiantes
            </h1>

            <form
                action="listar.php"
                method="GET"
                class="row g-2 mb-4"
                id="formBusqueda">

                <div class="col-12 col-md-5">
                    <label for="buscar" class="form-label text-white">
                        Nombre o correo
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="buscar"
                        name="buscar"
                        placeholder="Escriba un nombre o correo"
                        value="<?php echo htmlspecialchars($buscar, ENT_QUOTES, 'UTF-8'); ?>">
                </div>

                <div class="col-12 col-md-4">
                    <label for="asignatura" class="form-label text-white">
                        Asignatura
                    </label>

                    <select
                        class="form-select"
                        id="asignatura"
                        name="asignatura">

                        <option value="">Todas las asignaturas</option>

                        <option
                            value="Ingeniería Informática"
                            <?php echo $asignatura === "Ingeniería Informática" ? "selected" : ""; ?>>
                            Ingeniería Informática
                        </option>

                        <option
                            value="Ingeniería Industrial"
                            <?php echo $asignatura === "Ingeniería Industrial" ? "selected" : ""; ?>>
                            Ingeniería Industrial
                        </option>

                        <option
                            value="Administración de Empresas"
                            <?php echo $asignatura === "Administración de Empresas" ? "selected" : ""; ?>>
                            Administración de Empresas
                        </option>

                    </select>
                </div>

                <div class="col-12 col-md-3 d-flex align-items-end gap-2">

                    <button type="submit" class="btn btn-danger flex-grow-1">
                        Buscar
                    </button>

                    <a href="listar.php" class="btn btn-dark">
                        Limpiar
                    </a>

                </div>

            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle bg-white text-dark">

                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Cédula</th>
                            <th>Correo</th>
                            <th>Asignatura</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php if ($resultado->num_rows > 0): ?>

                            <?php while ($fila = $resultado->fetch_assoc()): ?>

                                <tr>

                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $fila["Nombre"] ?? "",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $fila["ID"] ?? "",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $fila["Correo"] ?? "",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <?php
                                        echo htmlspecialchars(
                                            $fila["Asignatura"] ?? "",
                                            ENT_QUOTES,
                                            "UTF-8"
                                        );
                                        ?>
                                    </td>

                                    <td>
                                        <div class="d-flex flex-wrap gap-2">

                                            <a
                                                href="editar.php?id=<?php
                                                    echo urlencode((string) $fila["ID"]);
                                                ?>"
                                                class="btn btn-warning btn-sm">
                                                Editar
                                            </a>

                                            <form
                                                action="eliminar.php"
                                                method="POST"
                                                class="form-eliminar">

                                                <input
                                                    type="hidden"
                                                    name="id"
                                                    value="<?php
                                                        echo htmlspecialchars(
                                                            (string) $fila["ID"],
                                                            ENT_QUOTES,
                                                            "UTF-8"
                                                        );
                                                    ?>">

                                                <button
                                                    type="submit"
                                                    class="btn btn-danger btn-sm">
                                                    Eliminar
                                                </button>

                                            </form>

                                        </div>
                                    </td>

                                </tr>

                            <?php endwhile; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="5" class="text-center py-4">
                                    No se encontraron estudiantes.
                                </td>
                            </tr>

                        <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <div class="d-grid mt-3">
                <a href="index.php" class="btn btn-dark">
                    Volver al registro
                </a>
            </div>

        </div>

    </div>

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>

<?php

$resultado->free();
$consulta->close();

?>