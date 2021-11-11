<?php
require_once 'actions/db_connect.php';
$sql = "SELECT * FROM hotels";
$result = mysqli_query($connect, $sql);
$card = '';
if (mysqli_num_rows($result)  > 0) {
    $heading = "<h2 class='text-center'>Our Hotels</h2>";
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $card .= "<div class='col-12 col-md-6 col-lg-3'>
        <div class='card' style='width: 18rem;'>
            <img src='img/" . $row['picture'] . "' class='card-img-top' alt='Error'>
            <div class='card-body'>
                <h5 class='card-title'>" . $row['hotel_name'] . "</h5>
                <p class='card-text'>" . $row['address'] . "</p>
                <h6>" . $row['price'] . "Euros per night</h6>
                <a href='update.php?id=" . $row['hotel_id'] . "' class='btn btn-primary'>Edit</a>
                <a href='delete.php?id=" . $row['hotel_id'] . "' class='btn btn-danger'>Delete</a>
            </div>
        </div>
    </div>";
    }
} else {
    $heading = "";
    $card = "<h4 class='text-center'>No data in to display.</h4>";
}
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once 'components/boot-css.php' ?>
    <title>Hotel-Index</title>
</head>

<body>
    <div class="container">
        <?= $heading; ?>
        <div class="row">
            <?= $card; ?>

        </div>
    </div>
    <hr>
    <div class="text-center"><a href="create.php" class="btn btn-info">Add hotel</a></div>

    <!-- script -->
    <?php require_once 'components/boot-js.php' ?>
</body>

</html>