<?php
$host = "localhost";
$user = "root";
$contra = "";
$dbname = "usuarios";

// Conexión con mysqli orientado a objetos
$link = new mysqli($host, $user, $contra, $dbname);

// Verificamos la conexión
if ($link->connect_error) {
    die("Conexión fallida: " . $link->connect_error);
} else {
    echo "Conectado correctamente";
}

$nombre = $_POST['nombreusuario'];
$email  = $_POST['emailusuario'];
$pass   = $_POST['passusuario'];

// Insertar datos
$sql = "INSERT INTO registro (nombreusuario, emailusuario, passusuario)
        VALUES ('$nombre', '$email', '$pass')";

if ($link->query($sql) === TRUE) {
    echo "Registro insertado correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $link->error;
}

// Cerramos la conexión
$link->close();

?>