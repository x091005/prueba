<?php
// Conexión a la base de datos
$servername = "sql307.epizy.com";
$username = "epiz_34074074";
$password = "SzI6ek7ciYrsF";
$dbname = "epiz_34074074_delheat";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Validar si se ha completado la tarea
if (isset($_POST['validar_tarea'])) {
    $user = "usuario1"; // Colocar aquí el usuario actual
    $puntos = 30;

    // Actualizar la cantidad de puntos del usuario
    $sql = "UPDATE usuarios SET puntos = puntos + $puntos WHERE user = '$user'";

    if (mysqli_query($conn, $sql)) {
        echo "completado";
    } else {
        echo "error";
    }
}

mysqli_close($conn);
?>

<script>
// Función para abrir el anuncio automáticamente
function abrirAnuncio() {
    // Código para abrir el anuncio estilo popup
    // Aquí puedes agregar tu código para mostrar el anuncio
    // Una vez que el usuario haya completado la tarea, puedes llamar a la función de actualizar puntos
    // Puedes hacerlo usando AJAX, tal como lo mostramos antes.
    actualizarPuntos(<?php echo $user_id; ?>, 30); // Actualizar puntos del usuario con ID $user_id y sumar 30 puntos

    // Simular un clic en el enlace de validar tarea
    $("a[href='tarea1.php']").click();
}

$(document).ready(function(){
    abrirAnuncio();
});
</script>

<!-- Agregar esto en el contenido de la tarea -->
<h2>Tarea 1: Abre el anuncio popup</h2>
<p>Esta tarea se completará automáticamente en unos segundos:</p>

<!-- Agregar esto en el encabezado de la tarea -->
<script>
function actualizarPuntos(user_id, puntos) {
    $.ajax({
        url: "actualizar_puntos.php",
        method: "POST",
        data: {user_id: user_id, puntos: puntos},
        success: function(response){
            console.log(response);
        },
        error: function(){
            alert("Error al procesar la solicitud.");
        }
    });
}
</script>

<div id="2455590" style="display: none;">
    <!-- Aquí iría el contenido del anuncio -->
</div>
