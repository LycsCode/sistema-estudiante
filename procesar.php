<?php

include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
die("Método de solicitud no permitido");
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$cedula = $_POST['cedula'];
$asignatura = $_POST['asignatura'];
$registroExitoso = true;

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
 
if ($consulta->num_rows > 0) {
die("Error: el correo ya está registrado");
}
 
$consulta->close();

//////////////////////////////////////////////////////////////////////////////

$insertar = $conexion->prepare(
"INSERT INTO personal
(nombre, id, correo, asignatura)
VALUES (?, ?, ?, ?)"
);
 
$insertar->bind_param(
"siss",
$nombre,
$cedula,
$correo,
$asignatura
);
 
if ($insertar->execute()) {
echo "Registro guardado correctamente";
} else {
echo "No fue posible guardar el registro";
}
 
$insertar->close();
$conexion->close();