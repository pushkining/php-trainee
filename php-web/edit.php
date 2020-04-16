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
<form method="POST">
    <div class="form-signin form-group m-3">
        <label>Редактировать по названию</label>
        <input type="text" class="form-control" placeholder="Enter movie" name="nameMov">
        <small id="emailHelp" class="form-text text-muted">Type please on English</small>
    </div>

    <button type="submit" class="btn btn-primary m-5" name="btn1">Поиск</button>
    <a class="btn btn-primary m-3" href="cinema.php" role="button">Вернуться</a>


</form>
<table class="table m-5">
    <thead>
    <tr>
        <th scope="col">Название</th>
        <th scope="col">Жанр</th>
        <th scope="col">Выход</th>
        <th scope="col">Режиссёр</th>
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php
    require 'connect.php';
    //        require 'edit.php';
    //        $nameMov = $_POST['nameMov'];
    if (isset($_POST['nameMov'])) {
        $nameMov = $_POST['nameMov'];
        $query = "SELECT * FROM movie JOIN director on movie.directorId=director.directorId WHERE nameMov = '$nameMov'";
        $result = mysqli_query($connection, $query);
        // echo "<a class=\"btn btn-primary m-3\" href=\"cinema.php\" role=\"button\">Вернуться</a>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['nameMov'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['releaseDate'] . "</td>";
            echo "<td>" . $row['nameDir'] . "</td>";
            echo "</tr>";
        }
    }
    var_dump($_GET);
    ?>
    </tbody>
</table>

<form method='GET'>

    <div class="input-group m-4">
        <input type="text" class="form-control" placeholder='Фильм' name='nameMov'>
        <input type="text" class="form-control" placeholder='Жанр' name='description'>
        <input type="date" class="form-control" placeholder='Дата выхода' name='releaseDate'>
        <input type="text" class="form-control" placeholder='Режиссёр' name='director'>
        <button type="submit" class="btn btn-primary" name="btn2">Редактировать</button>

        <?php
        if (isset($_GET['nameMov']) && isset($_GET['description']) && isset($_GET['releaseDate']) && isset($_POST['nameMov']) && isset($_GET['nameDir'])) {
            $nameMov1 = $_POST['nameMov'];
            $nameMov = $_GET['nameMov'];
            $description = $_GET['description'];
            $releaseDate = $_GET['releaseDate'];
            $nameDir = $_GET['nameDir'];
            $query1 = "UPDATE movie SET nameMov = '$nameMov', description = '$description', releaseDate = '$releaseDate' WHERE nameMov = '$nameMov1';";
            $query1 .= "UPDATE director SET nameDir = '$nameDir' WHERE (SELECT nameMov FROM director) = '$nameMov1'";
            $result1 = mysqli_multi_query($connection, $query1);
        }
        //    if (isset($_GET['nameDir'])){
        //        $nameMovOld = $_POST['nameMov'];
        //        $nameDir = $_GET['nameDir'];
        //        $query = "UPDATE director SET nameDir = '$nameDir WHERE (SELECT nameMov FROM director) = '$nameMovOld'";
        //        $result = mysqli_query($connection, $query);
        //    }

        //var_dump($nameMov1);
        ?>
</form>
</body>
</html>