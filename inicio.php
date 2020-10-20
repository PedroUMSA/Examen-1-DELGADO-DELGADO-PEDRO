<?php
include "conexion.inc.php";

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
  $color1 = '#092756';
  $color2 = '#2466bd';
  $c1=true;
} else if ($condicion == 'v2'){
  $color1 ='#177534';
  $color2 ='#26bf55';
  $c2=true;
}else if($condicion == 'v3'){
  $color1 ='#820d0d';
  $color2 ='#e01616';
  $c3=true;
} else if($condicion == 'v4'){
  $color1 ='#737814';
  $color2 ='#c1c926';
  $c4=true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>

<body class="body1" <?php echo 'style="background:' . $color1 . ';"'; ?>>


  <div class="login">
    <img class="img1">
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
      
      <button type="submit" class="btn" <?php echo 'style="background:' . $color2 . ';"'; ?>>Recargar</button>
    </form>
    <br>
    <form action="index.php">
    <button type="submit" class="btn" <?php echo 'style="background:' . $color2 . ';"'; ?>>Atras</button>
    </form>
  </div>
</body>

</html>