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

    <title>Investments Overview - Add Items</title>

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
                <a href="dashboard.php"><button class="button-custom white fs-3">Home</button></a>
            </div>

            <div>
                <button class="button-custom white fs-3 aktivan">Add items</button>
            </div>
    </div>

</section>


<section class="add-item white">

    <h1 class="white text-center py-3">Add an item</h1>

    <form action="add_items_to_database.php" method="post">

        <div class="mx-5 px-5">

        <div class="mb-3 w-100 justify-content-center">
                <label for="" class="form-label">Item:</label>
                <select data-live-search="true" class="select form-control form-control-lg" name="item_id">
                    <option value="" selected disabled required>Choose an item</option>
                    <?php

                    $sql = "SELECT item_id, item_name FROM items";

                    $run = $connect ->query($sql);

                    $results = $run -> fetch_all(MYSQLI_ASSOC);

                    foreach($results as $result)
                    {
                        echo "<option value='". $result['item_id'] ."'>" . $result['item_name'] . "</option>";
                    }

                    ?>
                </select>
            </div>

            <div class="mb-3 w-100">
                <label for="" class="form-label">Quantity</label>
                <input type="text" class="form-control form-control-lg" name="item_quantity" required>
            </div>

            <div class="mb-4 w-100">
                <label for="" class="form-label">Price paid per item (€)</label>
                <input type="text" class="form-control form-control-lg" name="item_price_paid_for" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-success fs-5 mb-3">Add to my investments</button>
            </div>

            
            <?php

            if(isset($_SESSION['success_message']) == true)
            {
            echo "<p class=" . "'success text-center'" . '>' .  $_SESSION['success_message'] . "</p>";
            unset($_SESSION["success_message"]);
            }

            ?>

        </div>
    </form>

</section>

<script src="js/index.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>

</html>