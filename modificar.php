<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $task = $_POST["task"];

    $sql = "UPDATE tasks SET task = '$task' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva tarea agregada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

echo "<script>window.location = 'index.php'</script>";
exit();
?>
