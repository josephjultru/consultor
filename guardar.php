<?php

$nombre = "nombre";
$correo = "correo";
$asunto = "asunto";

// Conexión con la base de datos SQLite
$db = new SQLite3('formulario.db');

// Escapar los datos recibidos
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$asunto = $_POST['asunto'];

// Insertar los datos en la tabla
$stmt = $db->prepare("INSERT INTO mensajes (nombre, correo, asunto) VALUES ($nombre, $correo, $asunto)");
$stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
$stmt->bindValue(':correo', $correo, SQLITE3_TEXT);
$stmt->bindValue(':asunto', $asunto, SQLITE3_TEXT);
$result = $stmt->execute();

if ($result) {
  echo "Mensaje guardado correctamente.";
} else {
  echo "Error al guardar.";
}

$db->close();
?>
