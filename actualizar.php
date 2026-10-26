<?php
 
include("conexion.php");
 
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$nombre = trim($_POST["nombre"] ?? "");
$correo = trim($_POST["correo"] ?? "");
$cedula = trim($_POST["cedula"] ?? "");
$asignatura = trim($_POST["asignatura"] ?? "");
 
if (
$id === false || 
$id === null ||
$nombre === "" ||
$correo === "" ||
$cedula === "" ||
$asignatura === ""
) { 
die("Datos no válidos");
}

/////////////////////////////VALIDACIÓN DE DATOS/////////////////////////////////

if (
$nombre === "" ||
$correo === "" ||
$cedula === "" ||
$asignatura === ""
) {
die("Error: todos los campos son obligatorios");
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
die("Error: el correo electrónico no tiene un formato válido");
}

$programasPermitidos = [
"Ingeniería Informática",
"Ingeniería Industrial",
"Administración de Empresas"
];
 
if (!in_array($asignatura, $programasPermitidos, true)) {
die("Error: el programa seleccionado no es válido");
}

$consulta = $conexion->prepare(
"SELECT correo FROM personal WHERE correo = ?"
);
 
$consulta->bind_param("s", $correo);
$consulta->execute();
$consulta->store_result();

$consulta->close();

//////////////////////////////////////////////////////////////////////////////
 
if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
die("Correo electrónico no válido");
}
 
$sql = $conexion->prepare(
"UPDATE personal
SET ID=?, Nombre = ?, Correo = ?, Asignatura = ?
WHERE id = ?"
);
 
$sql->bind_param(
"isssi",
$cedula,
$nombre,
$correo,
$asignatura,
$id
);
 
$sql->execute();
 
header("Location: listar.php");
exit;
 
?>
