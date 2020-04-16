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
<?php
require 'connect.php';
$query = "SELECT * FROM movie JOIN director on movie.directorId=director.directorId ORDER BY movieId";

?>
<div class="input-group mr-5">
    <form action="" method="POST">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Жанр</th>
                <th scope="col">Выход</th>
                <th scope="col">Режиссёр</th>
                <th scope="col">

                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($result = mysqli_query($connection, $query)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['nameMov'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";
                    echo "<td>" . $row['releaseDate'] . "</td>";
                    echo "<td>" . $row['nameDir'] . "</td>";
                    echo "</tr>";
                }
            }
            ?>
            </tbody>
        </table>
        <a class="btn btn-primary" href="add.php" role="button">Добавить</a>
        <a class="btn btn-primary" href="delete.php" role="button">Удалить</a>
        <a class="btn btn-primary" href="edit.php" role="button">Редактировать</a>
    </form>


</div>

</body>
</html>