<?php

require_once('config.php');

if(isset($_SESSION['user_id']) == false)
{
    header('location: index.php');
    exit;
}


if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $user_item_id = $_POST['user_item_id'];
    $user_id = $_SESSION['user_id'];
}

$sql = "DELETE FROM user_items WHERE user_id = ? AND user_item_id = ?";

$run = $connect -> prepare($sql);

$run -> bind_param("ii", $user_id, $user_item_id);

$run -> execute();

header('location: dashboard.php');
exit;

?>