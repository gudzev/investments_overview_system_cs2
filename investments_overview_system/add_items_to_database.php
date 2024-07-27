<?php

require_once('config.php');

if(isset($_SESSION['user_id']) == false)
{
    header('location: index.php');
    exit;
}

if(!$_SERVER['REQUEST_METHOD'] == "POST")
{
    header('location: add_items.php');
    exit;
}

$item_quantity = $_POST['item_quantity'];
$item_price_paid_for = $_POST['item_price_paid_for'] . '€';
$item_id = $_POST['item_id'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO user_items(item_quantity, item_price_paid_for, item_id, user_id) VALUES(?, ?, ?, ?)";

$run = $connect ->prepare($sql);

$run -> bind_param("sssi", $item_quantity, $item_price_paid_for, $item_id, $user_id);

$run -> execute();

$connect->close();
$run->close();

$_SESSION['success_message'] = "Item has been succesfully added to your account!";

header('location: add_items.php');
exit;

?>
