<?php
header("Content-Type: application/json; charset=UTF-8");

ini_set("display_errors", "0");

require_once("conexion.php");

if (!isset($conexion) || $conexion->connect_error) {
    http_response_code(500);

    echo json_encode([
        "exito" => false,
        "mensaje" => "No fue posible conectar con la base de datos."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

$sql = "SELECT ID, Nombre, Correo, Asignatura
        FROM personal
        ORDER BY Nombre ASC";

$consulta = $conexion->prepare($sql);

if (!$consulta) {
    http_response_code(500);

    echo json_encode([
        "exito" => false,
        "mensaje" => "No fue posible preparar la consulta."
    ], JSON_UNESCAPED_UNICODE);

    exit;
}

if (!$consulta->execute()) {
    http_response_code(500);

    echo json_encode([
        "exito" => false,
        "mensaje" => "No fue posible consultar los estudiantes."
    ], JSON_UNESCAPED_UNICODE);

    $consulta->close();
    exit;
}

$resultado = $consulta->get_result();

$estudiantes = [];

while ($fila = $resultado->fetch_assoc()) {

    $estudiantes[] = [
        "id" => $fila["ID"],
        "nombre" => $fila["Nombre"],
        "correo" => $fila["Correo"],
        "asignatura" => $fila["Asignatura"]
    ];

}

$resultado->free();
$consulta->close();

echo json_encode([
    "exito" => true,
    "total" => count($estudiantes),
    "estudiantes" => $estudiantes
], JSON_UNESCAPED_UNICODE);

?>