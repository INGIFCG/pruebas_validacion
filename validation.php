<?php
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

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
    if (count($validacion) > 0) {
      foreach ($validacion as $val) {
        echo "<div class='error'><li>" .$val. "</li></div>";
      }
    } else {
      echo "<div class='Correcto'>
                    Datos correctos";
    }
    echo "</div>";
  } 
  ?>