<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {
    $name = $_POST['hotel_name'];
    $address = $_POST['address'];
    $price = $_POST['price'];
    $id = $_POST['hotel_id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';

    $picture = file_upload($_FILES['picture']); //file_upload() called  
    if ($picture->error === 0) {
        ($_POST["picture"] == "default-pic.jpg") ?: unlink("../img/$_POST[picture]");
        $sql = "UPDATE hotels SET hotel_name = '$name', address='$address', price = $price, picture = '$picture->fileName' WHERE hotel_id = {$id}";
    } else {
        $sql = "UPDATE hotels SET hotel_name = '$name', address='$address', price = $price WHERE hotel_id = {$id}";
    }
    if (mysqli_query($connect, $sql) === TRUE) {
        $class = "success";
        $message = "The record was successfully updated";
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    } else {
        $class = "danger";
        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Update</title>
    <?php require_once '../components/boot-css.php' ?>
</head>

<body>
    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Update request response</h1>
        </div>
        <div class="alert alert-<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
            <a href='../update.php?id=<?= $id; ?>'><button class="btn btn-warning" type='button'>Back</button></a>
            <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
        </div>
    </div>
    <?php require_once '../components/boot-js.php' ?>
</body>

</html>