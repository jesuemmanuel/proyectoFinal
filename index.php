<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tareas</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>Lista de Tareas</h1>
    <form action="insertar.php" method="post">
        <input type="text" name="task" placeholder="Nueva tarea" required>
        <button type="submit">Agregar</button>
    </form>
    <ul>
        <?php
        include 'conexion.php';
        $sql = "SELECT * FROM tasks";
        $result = $conn->query($sql);
        $class = "";

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['status'] == 1) {
                    $class = "ended";
                }
                echo "<li class=" . $class . "><div>" . $row["task"] . "</div><div class='action'><a href=\"./index.php?id=$row[id]\">&#128397;</a>";
                if ($row['status'] == 0) {
                    echo "<a class='BotonesTeam3' href=\"./eliminar.php?id=$row[id]\" onClick=\"return confirm('¿Estás seguro de eliminar la categoría?')\">&#10006;</a></div></li>";
                }
            }
        } else {
            echo "No hay tareas.";
        }
        ?>
    </ul>

    <?php
    $hidd = "";
    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM tasks WHERE id = '$id'";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $task = $row['task'];
            }
        }
    } else {
        $hidd = "hidden";
    }
    ?>

    <div class="container-modal 1 <?php if ($hidd)  echo "hidden"; ?>">
        <div class="btn-cerrar">
            <label for="btn-modal" class="lbl-modal"></label>
        </div>
        <div class="content-modal">
            <div class="contenedor_productos productos_modal">
                <form action="modificar.php" method="POST" enctype="multipart/form-data">
                    <label for="task">Tarea:</label><br>
                    <input type="text" class="task" name="task" id="task" value="<?php echo $task ?>" required><br><br>

                    <input type="hidden" name="id" value="<?php echo $id ?>">

                    <div>
                        <button onClick="window.location.href='index.php'">Volver</button>
                        <button type="submit" name="subModif">Enviar</button>
                    </div>
                </form>
            </div>
            <label for="btn-modal" class="cerrar-modal lbl-modal modif"></label>
        </div>
    </div>

</body>

</html>