
<?php
$conn = mysqli_connect("sql302.byethost13.com", "b13_36951409", "benjamin5");
$consulta1=mysqli_select_db($conn, "b13_36951409_proyecto");
// La consulta SQL
$sql = "SELECT DISTINCT tipo FROM productos";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Recorrer los resultados
    while($row = $result->fetch_assoc()) {
        echo "Valor: " . $row["tipo"] . "<br>";
    }
} else {
    echo "No se encontraron resultados.";
}

// Cerrar la conexión
$conn->close();
?>