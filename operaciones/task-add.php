

<?php 

    include "../database.php";

    if (isset($_POST['name'])){

        $name = $_POST['name'];
        $description = $_POST['description'];

        $query = "INSERT INTO task(name, description) VALUES ('$name', '$description')";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error($conn));
        }
        echo "Task Added";
    }


?>