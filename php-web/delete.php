<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<html>
<body>
<?php
require 'connect.php';
if(isset($_GET['nameMov'])){
    $nameMov = $_GET['nameMov'];
    $query = "DELETE FROM movie WHERE nameMov = '$nameMov'";
    $result = mysqli_query($connection, $query);
    echo "Информация успешно удаленна";
    
}
?>
<form method="GET">
    <div class="form-signin form-group m-3">
        <label>Удалить по названию</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter movie" name="nameMov">
        <small id="emailHelp" class="form-text text-muted">Type please on English</small>
    </div>

    <button type="submit" class="btn btn-primary m-5">Удалить</button>
    <a class="btn btn-primary m-3" href="cinema.php" role="button">Вернуться</a>

</form>
</body>
</html>


