<?php 

    include "../database.php";

    // $id = $_POST['id'];

    // $query = "SELECT * FROM task WHERE id = $id";
    // $result = mysqli_query($conn, $query);

    // if (!$result) {
    //     die("Query Failed" . mysqli_error($conn));
    // }

    // $json = array();
    // while ($row = mysqli_fetch_array($result)){
    //     $json[] = array(
    //         'name'=>$row['name'],
    //         'description'=>$row['description'],
    //         'id'=>$row['id']
    //     );
    // }

    // $jsonString = json_encode($json[0]);
    // echo ($jsonString); 


    // //// 


    $id = $_POST['id'];

    // Usar sentencias preparadas para prevenir inyección SQL
    $stmt = $conn->prepare("SELECT * FROM task WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $json = array(
        'name' => $row['name'],
        'description' => $row['description'],
        'id' => $row['id']
    );

    echo json_encode($json);

