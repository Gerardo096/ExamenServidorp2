<?php

$servidor = "localhost";
$baseDatos = "usuarios";
$usuario = "root";
$password = "root";

$conn = mysqli_connect($servidor, $usuario, $password, $baseDatos);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email=$_POST['email'];
$pass=$_POST['pass'];





$sql = "SELECT * FROM usuarios WHERE email = $email AND pass= $pass";

if (mysqli_query($conn, $sql)) {
$numeroFilas=mysqli_num_rows($sql)
if($numeroFilas !=0){
    echo "Usuario correcto <br>";
    echo'<a href="index.html">VOLVER</a><br>' ;
}else{
    echo "Usuario incorrecto <br>";
    echo'<a href="index.html">VOLVER</a><br>' ;
}
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
echo'<a href="index.html">VOLVER</a><br>' ;
}




?>