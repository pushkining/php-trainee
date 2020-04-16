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
    session_start();
    include ('connect.php');

    if (isset($_POST['username']) and isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
        $count = mysqli_num_rows($result);

        if($count == 1) {
            $_SESSION['username'] = $username;
        }else{
            $fsmsg = "Ошибка";
        }
    }

    ?>
    <div class="contanier">
        <form class="form-signin" method="POST">
        <h2>Login</h2>
<?php if(isset($fsmsg)) { ?> <div class="alert alert-danger" role="alert"> <?php echo $fsmsg ?> </div> <?php } ?>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
            <?php
            // var_dump ($_SESSION);
            if(isset($_SESSION['username'])){
                $_SESSION['username'] = $username;
                echo "<h2>Hello</h2>  ".$username;
                echo "<a class=\"btn btn-primary\" href=\"cinema.php\" role=\"button\">Далее</a>";
            }
            ?>
        </form>
    </div>
</body>
</html>