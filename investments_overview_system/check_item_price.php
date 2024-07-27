<?php

require_once('config.php');

if(isset($_SESSION['user_id']) == false)
{
    header('location: index.php');
    exit;
}

$sql2 = "SELECT item_url FROM items";

$run = $connect->query($sql2);


$url = $results['item_url'];

// Initialize a cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

// Execute the cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    echo "cURL Error: " . curl_error($ch);
    curl_close($ch);
    exit;
}

// Close the cURL session
curl_close($ch);

// Decode the JSON response
$data = json_decode($response, true);

// Check if the decoding was successful
if ($data === null) {
    echo "Error decoding JSON response.";
    exit;
}

echo $data['lowest_price'];

$connect->close();
$run->close();

?>
