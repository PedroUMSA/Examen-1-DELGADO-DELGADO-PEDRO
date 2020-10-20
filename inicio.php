<?php
include "conexion.inc.php";
include "cabecera.ini.php";

$user = $_GET["u"];
$passw = $_GET["p"];
//echo 'Saludos ' . $user . ' ' . $passw;
$sql = "select i.nombre from identificador as i, usuario as u where '$user'=u.nick and '$passw'=u.clave and u.ci = i.ci";
$resultado = mysqli_query($conn, $sql);
$fila = mysqli_fetch_row($resultado);

$c1=false;
$c2=false;
$c3=false;
$c4=false;

$condicion = $_GET["select"];
if ($condicion == 'v1') {
  $cb='class="body11"';
  $cbt='class="btn1"';
  $c1=true;
} else if ($condicion == 'v2'){
  $cb='class="body12"';
  $cbt='class="btn2"';
  $c2=true;
}else if($condicion == 'v3'){
  $cb='class="body13"';
  $cbt='class="btn3"';
  $c3=true;
} else if($condicion == 'v4'){
  $cb='class="body14"';
  $cbt='class="btn4"';
  $c4=true;
}
?>
<body <?php echo $cb; ?>>

  <div class="login">
  <center><img class="img1"></center>
    <br>
    <?php
    if(strlen($fila[0])==0){
      echo '<h1>USTED NO ES USUARIO</h1>';
    }else{
      echo '<h1>BIENVENIDA : ' . $fila[0] . '</h1>';
    }
    ?>
    <br>
    <form method="get" action="inicio.php">
      <select name="select">
        <option value="v1" <?php if($c1){echo 'selected';} ?>>Azul</option>
        <option value="v2" <?php if($c2){echo 'selected';} ?>>Verde</option>
        <option value="v3" <?php if($c3){echo 'selected';} ?>>Rojo</option>
        <option value="v4" <?php if($c4){echo 'selected';} ?>>Amarillo</option>
      </select>
      <input class="input1" type="text" name="u" value=<?php echo $user; ?>>
      <input class="input1" type="text" name="p" value=<?php echo $passw; ?>>
      
      <button type="submit"  <?php echo $cbt; ?>>Recargar</button>
    </form>
    <br>
    <form action="index.php">
    <button type="submit"  <?php echo $cbt; ?>>Atras</button>
    </form>
  </div>
</body>

</html>