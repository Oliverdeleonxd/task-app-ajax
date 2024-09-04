<?php
include('../database.php');

$id = $_POST['id'];

$query = "SELECT * FROM task WHERE id = $id";
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Query Failed.');
}

$task = mysqli_fetch_assoc($result);
echo json_encode($task);
?>
