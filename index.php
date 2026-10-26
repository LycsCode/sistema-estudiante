<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Registro de Estudiantes</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="styles.css">

    <!-- JavaScript: se ejecuta cuando el HTML ya está cargado -->
    <script src="js/app.js" defer></script>
</head>

<body>

    <div class="container mt-5 mb-5">

        <div class="card formulario p-4 shadow">

            <h1 class="titulo text-center mb-4 text-white">
                Registro de Estudiantes
            </h1>

            <form action="procesar.php" method="POST" id="formEstudiante">

                <div class="mb-3 text-white">
                    <label for="nombre" class="form-label letras">
                        Nombre completo
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="nombre"
                        name="nombre"
                        placeholder="Ingrese el nombre completo"
                        required>
                </div>

                <div class="mb-3 text-white">
                    <label for="cedula" class="form-label letras">
                        Cédula
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="cedula"
                        name="cedula"
                        placeholder="Ingrese el número de cédula"
                        inputmode="numeric"
                        pattern="[0-9]+"
                        required>
                </div>

                <div class="mb-3 text-white">
                    <label for="correo" class="form-label letras">
                        Correo electrónico
                    </label>

                    <input
                        type="email"
                        class="form-control"
                        id="correo"
                        name="correo"
                        placeholder="Ingrese el correo electrónico"
                        required>
                </div>

                <div class="mb-3 text-white">
                    <label for="asignatura" class="form-label letras">
                        Asignatura o programa
                    </label>

                    <select
                        class="form-select"
                        id="asignatura"
                        name="asignatura"
                        required>

                        <option value="" selected disabled>
                            Seleccione una asignatura
                        </option>

                        <option value="Ingeniería Informática">
                            Ingeniería Informática
                        </option>

                        <option value="Ingeniería Industrial">
                            Ingeniería Industrial
                        </option>

                        <option value="Administración de Empresas">
                            Administración de Empresas
                        </option>

                    </select>
                </div>

                <div
                    id="mensajeError"
                    class="alert alert-danger d-none"
                    role="alert"
                    aria-live="polite">
                </div>

                <div class="d-grid gap-2 mt-4">

                    <button
                        type="submit"
                        class="btn btn-enviar btn-danger">
                        Registrar estudiante
                    </button>

                    <a
                        href="listar.php"
                        class="btn btn-dark">
                        Consultar estudiantes
                    </a>

                </div>

            </form>

        </div>

    </div>

    <!-- Bootstrap JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js">
    </script>

</body>

</html>
