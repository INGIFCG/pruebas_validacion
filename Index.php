<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="stiles/Stiles.css" />
  <title>Validacion de datos</title>
</head>

<body>
  <?php
  $username = "";
  $email = "";
  $password = "";
  $countri = "";
  $level = "";

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $countri = $_POST['countri'];
    if(isset($_POST['level'])){
      $level = $_POST['level'];
    }else{
      $level ="";
    }

    $validacion = array();

    if (empty($username)) {
      array_push($validacion, "El campo Username no puede estar vacio");
    }
    if (empty($email) || strpos($email, "@") === false) {
      array_push($validacion, "Por favor ingrese un correo electronico valido");
    }
    if (empty($password) || strlen($password) < 6) {
      array_push($validacion, " El password no puede estar vacio o tener menos de 7 caracteres");
    }
    if ($countri== "") {
      array_push($validacion, "Debe seleccionar un pais para continuar");
    }
    if ($level== "") {
      array_push($validacion, "Debe seleccionar un nivel de desarollador para continuar");
    }
    if (count($validacion) > 0) {
      foreach ($validacion as $val) {
        echo "<div class='error'><li>" . $val . "</li></div>";
      }  
    } else {
      echo "<div class='Correcto'>
                    Datos correctos";
    }
    echo "</div>";
  }
  ?>
  <div class="container">
    <h1>Register</h1>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
      <div class="input_form">
        <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $username ?>" />
      </div>
      <div class="input_form">
        <input type="email" name="email" id="email" placeholder="Email Address" value="<?php echo $email ?>" />
      </div>
      <div class="input_form">
        <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password ?>" />
      </div>
      <div class="input_form">
        <select name="countri" id="countri">
          <option value="">Select a countri</option>
          <option value="vz"<?php if($countri== "vz") echo "selected";?>>Venezuela</option>
          <option value="cl"<?php if($countri== "cl") echo "selected";?>>Colombia</option>
          <option value="mx"<?php if($countri== "mx") echo "selected";?>>Mexico</option>
          <option value="eu"<?php if($countri== "eu") echo "selected";?>>Estados Unidos</option>
        </select>
      </div>
      <div class="input_form">
        <input type="radio" name="level" <?php if($level=="basic")echo "cheked"?>value="basic"> Basic</input>
        <input type="radio" name="level" <?php if($level=="medium")echo "cheked"?>value="medium"> Medium</input>
        <input type="radio" name="level" <?php if($level=="hard")echo "cheked"?>value="hard"> Hard</input>
        <input type="radio" name="level" <?php if($level=="master")echo "cheked"?>value="master"> Master</input>
      </div>
      
      <div class="button">
        <input type="submit" name="submit" id="submit">
      </div>
    </form>
  </div>
  </div>
</body>

</html>