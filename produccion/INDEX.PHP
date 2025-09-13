<?php
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $PL  = floatval($_POST['PL'] ?? 0);
    $PMA = floatval($_POST['PMA'] ?? 0);
    $PMI = floatval($_POST['PMI'] ?? 0);
    $PJ  = floatval($_POST['PJ'] ?? 0);
    $PV  = floatval($_POST['PV'] ?? 0);
    $PS  = floatval($_POST['PS'] ?? 0);

    $PT = $PL + $PMA + $PMI + $PJ + $PV + $PS;
    $PP = $PT / 6;

    if ($PP >= 100) {
        $mensaje = "✅ El operario SÍ recibe incentivos. Promedio: $PP";
    } else {
        $mensaje = "❌ El operario NO recibe incentivos. Promedio: $PP";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Producción Semanal</title>
</head>
<body>
  <h1>Registro de Producción Semanal</h1>
  <form method="post">
    <label>Lunes (PL):</label><input type="number" name="PL" required><br>
    <label>Martes (PMA):</label><input type="number" name="PMA" required><br>
    <label>Miércoles (PMI):</label><input type="number" name="PMI" required><br>
    <label>Jueves (PJ):</label><input type="number" name="PJ" required><br>
    <label>Viernes (PV):</label><input type="number" name="PV" required><br>
    <label>Sábado (PS):</label><input type="number" name="PS" required><br><br>
    <button type="submit">Calcular</button>
  </form>

  <?php if ($mensaje): ?>
    <h2><?= $mensaje ?></h2>
  <?php endif; ?>
</body>
</html>
