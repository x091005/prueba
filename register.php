<?php
// Conexión a la base de datos
$servername = "sql307.epizy.com";
$username = "epiz_34074074";
$password = "SzI6ek7ciYrsF";
$dbname = "epiz_34074074_delheat";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Obtener los datos del formulario
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Validar los datos del formulario
if (empty($username) || empty($email) || empty($password)) {
    die("Por favor complete todos los campos del formulario.");
}

// Verificar si el usuario ya existe en la base de datos
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    die("El nombre de usuario ya existe. Por favor, elija otro.");
}

// Insertar los datos en la base de datos
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
    header("Location: registro_exitoso.html");
    exit();
} else {
    die("Error al registrar usuario: " . mysqli_error($conn));
}

mysqli_close($conn);
?>
