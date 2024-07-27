<?php

require_once('config.php');

if(isset($_SESSION['user_id']) == false)
{
    header('location: index.php');
    exit;
}

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Page-Enter" content="blendTrans(Duration=.01)" />
    <meta http-equiv="Page-Exit" content="blendTrans(Duration=.01)" />

    <title>Investments Overview - Dashboard</title>

    <link rel="stylesheet" href="css/dashboard.css" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>

<header>
    <nav>
        <ul>
            <li><img src="img/menu_white.png" alt="Menu" onclick="openMenu()" class="m-top ul-image"/></li>

                <form action="log_out.php" method="post"><button type="submit" class="logout white fs-3">Log Out</button></form>
    </ul>
    </nav>
</header>

<section class="menu" id="menu">

    <div class="buttons">
            <div>
                <button class="button-custom white fs-3 aktivan">Home</button>
            </div>

            <div>
                <a href="add_items.php"><button class="button-custom white fs-3 ">Add items</button></a>
            </div>
    </div>

</section>


<section class="content">

    <?php

    function returnPrice($url)
    {
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
        echo "error";
        return;
    }

    return ($data['lowest_price']);
    }

    $user_id = $_SESSION['user_id'];

    $sql = "SELECT *, item_name, item_image_url
            FROM user_items
            LEFT JOIN items ON items.item_id = user_items.item_id
            WHERE user_id = $user_id";
            

    $run = $connect -> query($sql);
    $results = $run -> fetch_all(MYSQLI_ASSOC);

    foreach($results as $result)
    {
        echo
        "
        <div class='item d-inline-flex mx-3 my-3'>

        <h1 class='white text-center mt-3 w-100 fs-5'>" . $result['item_name'] . "</h1>

        <img src=" . $result['item_image_url'] . "width = 125 height = 125>

        <div class='item-details'>
            <div class='item-details-center'>

           <label for='' class='text-white fs-5'>Quantity: " . $result['item_quantity'] . "</label> <br>
            <label for='' class='text-white fs-5'>Price you paid per item: " . $result['item_price_paid_for'] . "</label> <br>";


                $url = $result['item_url'];
                $currentPrice = returnPrice($url);

                echo "<label for='' class='text-white fs-5'>Current Price: " . $currentPrice . "</label> <br>" .

                "<label for='' class='text-white fs-5'>Total profit: " . (floatval(str_replace(['€', ','], ['', '.'], $currentPrice)) - floatval(str_replace(['€', ','], ['', '.'], $result['item_price_paid_for']))) * (int)$result['item_quantity'] .  '€' . "</label> <br>" .
            
            " </div>
             </div>
            </div>
            ";
    }
    ?>

</section>

<script src="js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>

<?php

$connect->close();
$run->close();

?>

</html>