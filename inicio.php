<?php
include "conexion.inc.php";
include "cabecera.ini.php";

$user = $_GET["u"];
$passw = $_GET["p"];

if (isset($_GET['select'])) {
  $col = $_GET['select'];
  switch ($col) {
    case 1:
      # code...
      $sql = "UPDATE academico.usuario SET color = '1' WHERE usuario.nick = '$user';";
      break;
    case 2:
      # code...
      $sql = "UPDATE academico.usuario SET color = '2' WHERE usuario.nick = '$user';";
      break;
    case 3:
      # code...
      $sql = "UPDATE academico.usuario SET color = '3' WHERE usuario.nick = '$user';";
      break;
    case 4:
      # code...
      $sql = "UPDATE academico.usuario SET color = '4' WHERE usuario.nick = '$user';";
      break;

    default:
      # code...
      break;
  }
  mysqli_query($conn, $sql);
}

//echo 'Saludos ' . $user . ' ' . $passw;
$sql = "select i.nombre,u.color from identificador as i, usuario as u where '$user'=u.nick and '$passw'=u.clave and u.ci = i.ci";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_row($resultado);

$c1 = false;
$c2 = false;
$c3 = false;
$c4 = false;

$condicion = $fila[1];
if ($condicion == 1) {
  $cb = 'class="body11"';
  $cbt = 'class="btn1"';
  $c1 = true;
} else if ($condicion == 2) {
  $cb = 'class="body12"';
  $cbt = 'class="btn2"';
  $c2 = true;
} else if ($condicion == 3) {
  $cb = 'class="body13"';
  $cbt = 'class="btn3"';
  $c3 = true;
} else if ($condicion == 4) {
  $cb = 'class="body14"';
  $cbt = 'class="btn4"';
  $c4 = true;
}
?>

<body <?php echo $cb; ?>>

  <div class="login">
    <center><img class="img1"></center>
    <br>
    <?php
    if (strlen($fila[0]) == 0) {
      echo '<h1>USTED NO ES USUARIO</h1>';
    } else {
      echo '<h1>BIENVENIDA : ' . $fila[0] . '</h1>';
    }
    ?>
    <br>
    <form method="get" action="inicio.php">
      <select name="select">
        <option value="1" <?php if ($c1) {
                            echo 'selected';
                          } ?>>Azul</option>
        <option value="2" <?php if ($c2) {
                            echo 'selected';
                          } ?>>Verde</option>
        <option value="3" <?php if ($c3) {
                            echo 'selected';
                          } ?>>Rojo</option>
        <option value="4" <?php if ($c4) {
                            echo 'selected';
                          } ?>>Amarillo</option>
      </select>
      <input class="input1" type="text" name="u" value=<?php echo $user; ?>>
      <input class="input1" type="text" name="p" value=<?php echo $passw; ?>>

      <button type="submit" <?php echo $cbt; ?>>Recargar</button>
    </form>
    <br>
    <form action="index.php">
      <button type="submit" <?php echo $cbt; ?>>Atras</button>
    </form>
  </div>
</body>

</html>