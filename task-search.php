
<?php 

    include "database.php";

    $search = $_POST['search'];
    if (!empty($search)) {

        $query = "SELECT * FROM task WHERE name LIKE '$search%' OR description LIKE '$search%'";

        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error($conn));
        }

        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
               'name'=>$row['name'],
                'descriptiom'=>$row['description'],
                'id'=>$row['id']             
            );
        }
        
        $jsonString= json_encode($json);
        echo $jsonString;

    }// if


?>