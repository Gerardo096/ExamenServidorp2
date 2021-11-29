<?php

$servidor = "localhost";
$baseDatos = "usuarios";
$usuario = "root";
$password = "root";

session_start();



$email = $_POST['email'];
$pass = $_POST['pass'];




$con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['password']);
$sql = $con->prepare("SELECT * FROM usuarios WHERE email = '$email';");
$sql->execute();


$row = $sql->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo "Este usuario no esta registrado en la base de datos, pruebe de nuevo";
} else {

    if (($pass == $row['password'])) {
        $_SESSION['email'] = $row['email'];
        $_SESSION['password'] = $row['password'];

        echo "Usuario Correcto";
    } else {
        echo "Contraseña Incorrecta, pruebe de nuevo";
    }
}
echo'<br><a href="index.html">Volver</a>';

?>