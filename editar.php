<?php
 
include("conexion.php");
 
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
 
if ($id === false || $id === null) {
die("Identificador no válido");
}
 
$consulta = $conexion->prepare(
"SELECT * FROM personal WHERE id = ?"
);
 
$consulta->bind_param("i", $id);
$consulta->execute();
$resultado = $consulta->get_result();
$personal = $resultado->fetch_assoc();
 
if (!$personal) {
die("Estudiante no encontrado");
}
 
?>
 
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editar Estudiante</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
 
<body class="container min-vh-100 d-flex justify-content-center align-items-center py-5">
<div class="card formulario w-100 p-4 shadow-lg border-0">
<h2 class="text-center text-white fw-bold mb-4">Editar estudiante</h2>
 
<form action="actualizar.php" method="POST">
 
<input type="hidden" name="id" value="<?php echo $personal['ID']; ?>">
 
<div class="mb-3">
<label class="form-label text-white">Nombre</label>
<input type="text" id="nombre "name="nombre" class="form-control" value="<?php echo $personal['Nombre']; ?>" required>
</div>
 
<div class="mb-3">
<label class="form-label text-white">Correo</label>
<input type="email"  id="correo" name="correo" class="form-control" value="<?php echo $personal['Correo']; ?>" required>
</div>
 
<div class="mb-3">
<label class="form-label text-white">Cedula</label>
<input type="number" id= "cedula "name="cedula" class="form-control" value="<?php echo $personal['ID']; ?>" required>
</div>
 
<div class="mb-3">
                    <label for="asignatura" class="form-label text-white">
                        Asignatura
                    </label>
                    
                    <select class="form-control" id="asignatura" name="asignatura" required>
                    <option value="" selected disabled>Seleccione una asignatura</option>
                    <option value="Ingeniería Informática">Ingeniería Informática</option>
                    <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                    <option value="Administración de Empresas">Administración de Empresas</option>
                    </select>
</div>
 
<button type="submit" class="btn btn-success w-100 mb-2">Guardar cambios</button>

<a href="listar.php" class="btn btn-dark w-100">Cancelar</a>
 
</form>
</div>
</body>
</html>