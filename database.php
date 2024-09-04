<?php 


    $servername = "localhost:3308";
    $username = "root";
    $password = ""; 
    $dbname = "tasks-app";


$conn = mysqli_connect($servername, $username, $password, $dbname);

// $conexion = new PDO("mysql:host={$this->servername};dbname={$this->dbname};", $this->username, $this->password);
// $conexion-> exec("SET CHARACTER SET utf8");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";


    // try {

    //     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //     // Configura PDO para que lance excepciones en caso de errores
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     // Establece el conjunto de caracteres a UTF-8
    //     $conn->exec("SET CHARACTER SET utf8");
    //     return $conn;
    
    //     echo "Connected successfully";
    // } catch (PDOException $e) {
    //     // Manejo de la excepción
    //     die("Connection failed: " . $e->getMessage());
    // }
    



?>