<?php
require_once 'db_connect.php';
require_once 'file_upload.php';
if ($_POST) { //checks if method $_Post was used
    $name = $_POST['hotel_name'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $uploadError = '';
    $picture = file_upload($_FILES['picture']);
    $sql = "INSERT INTO hotels (hotel_name, address, price, picture) VALUES ('$name','$address', $price, '$picture->fileName')";
    if (mysqli_query($connect, $sql) === true) {
        $class = "success";
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $address </td>
            <td> $price </td>
            </tr></table><hr>";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while creating record. Try again: <br>" . $connect->error;
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php"); //this redirects to the error page if connection or query failed.
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once '../components/boot-css.php' ?>
    <title>Update</title>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Create request response</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <!-- If  -->
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
        </div>
    </div>
    <?php require_once '../components/boot-js.php' ?>
</body>

</html>