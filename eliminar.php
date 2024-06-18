<?php
include 'conexion.php';

$id = $_GET["id"];

$sql = "UPDATE tasks SET status = '1' WHERE id = '$id'";

if ($conn->query($sql) === FALSE) {
    die("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();

echo "<script>window.location = 'index.php'</script>";
exit();
