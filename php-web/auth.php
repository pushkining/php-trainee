<?php
include ('connect.php');
if (isset($_POST['auth_name'])) {
    $name=mysqli_real_escape_string($connection, $_POST['auth_name']);
    $pass=mysqli_real_escape_string($connection, $_POST['auth_pass']);
    $query = "SELECT * FROM users WHERE username='$name' AND password='$pass'";
    $res = mysqli_query($connection, $query) or trigger_error(mysqli_error().$query);
    if ($row = mysqli_fetch_assoc($res)) {
        session_start();
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
    }
    header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
    exit;
}
if (isset($_GET['action']) AND $_GET['action']=="logout") {
    session_start();
    session_destroy();
    header("Location: http://".$_SERVER['HTTP_HOST']."/");
    exit;
}
if (isset($_REQUEST[session_name()])) session_start();
if (isset($_SESSION['user_id']) AND $_SESSION['ip'] == $_SERVER['REMOTE_ADDR']) return;
else {
    ?>
    <form class="form-signin" method="POST">
        <input class="form-control" type="text" name="auth_name"><br>
        <input class="form-control" type="password" name="auth_pass"><br>
        <input class="btn btn-lg btn-primary btn-block" type="submit"><br>
    </form>
    <?php
}
exit;
?>