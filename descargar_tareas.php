<?php
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename="lista_tareas.txt"');

$tareas = [];
if (isset($_GET['tarea']) && isset($_GET['color'])) {
    $nombresTareas = $_GET['tarea'];
    $coloresTareas = $_GET['color'];

    for ($i = 0; $i < count($nombresTareas); $i++) {
        if (!empty($nombresTareas[$i]) && !empty($coloresTareas[$i])) {
            $tareas[] = ["tarea" => htmlspecialchars($nombresTareas[$i]), "color" => htmlspecialchars($coloresTareas[$i])];
        }
    }
}

if (empty($tareas)) {
    echo "No hay tareas para descargar.\n";
} else {
    foreach ($tareas as $tarea) {
        echo $tarea['tarea'] . " - " . $tarea['color'] . "\n";
    }
}
?>