<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<html>
<body>

<div class="container">
    <form id="data" class="form-signin" method="POST">
        <input type="text" class="form-control" name="nameMov" aria-describedby="" placeholder="Название">
        <select class="mdb-select md-form form-control" searchable="Search here.." form="data" name="description">
          <option value="" disabled selected>Choose your description</option>
          <option value="drama" >drama</option>
          <option value="comedy" >comedy</option>
          <option value="history" >history</option>
          <option value="horror" >horror</option>
        </select>
        <input type="date" class="form-control" name="releaseDate">
        <select class="mdb-select md-form form-control" searchable="Search here.." form="data" name="directorId">
          <option value="" disabled selected>Choose your director</option>
          <option value="2" > Tarantino</option>
          <option value="0" >Hickhook</option>
          <option value="3" >Abrams</option>
          <option value="1" >Cameron</option>
        </select>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить</button>
        <?php
require 'connect.php';

if (isset($_POST['nameMov']) and isset($_POST['description']) and isset($_POST['releaseDate']) and isset($_POST['directorId'])) {
    $nameMov = $_POST['nameMov'];
    $nameMov = strip_tags($nameMov);
    $description = $_POST['description'];
    $releaseDate = $_POST['releaseDate'];
    $directorId = $_POST['directorId'];
    $query = "INSERT INTO movie (nameMov, description, releaseDate, directorId) ";
    $query .="VALUES ('$nameMov', '$description', '$releaseDate', '$directorId')";
//    $query = mysqli_real_escape_string($connection,$query);
    $result = mysqli_query($connection, $query);
    if ($result == true) {
        echo "Информация занесена в базу данных";
    } else {
        echo "Информация не занесена в базу данных";
    }
    echo "<a class=\"btn btn-primary m-3\" href=\"cinema.php\" role=\"button\">Вернуться</a>";

}
?>
      
    </form>
</div>

</body>
</html>