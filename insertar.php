<?php
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task = $_POST["task"];

    $sql = "INSERT INTO tasks (task) VALUES ('$task')";

    if ($conn->query($sql) === FALSE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    $conn->close();
}

echo "<script>window.location = 'index.php'</script>";
exit();
?>
