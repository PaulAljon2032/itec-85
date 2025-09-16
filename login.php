<?php
$file = "users_list.json";
if (file_exists($file)) {
    $data = file_get_contents($file);
    $user_list = json_decode($data, true);
} else {
    $user_list = [];
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = md5($_POST["password"], FALSE);
    if(array_key_exists($user, $user_list)) {
        if ($user_list[$user] === $pass) {
            echo "
                <script>alert('Welcome $user!');</script>
            ";
        } else {
            echo "
                <script>alert('Incorrect Password!');</script>
            ";
        }
    } else {
        echo "
                <script>alert('Username does not exist!');</script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="bootstrap-5.3.7-dist/css/bootstrap.min.css">
        <title>Login</title>
    </head>
    <body class="b_center">
        <div class="reg_center border border-dark rounded pt-2 ps-3">
        <h2 class="text-center">User Login</h2><br><br>
            <form method="POST">
                <label for="username" class="text-dark">Username: </label><br>
                <input type="text" id="username" name="username" class="user_name border bordeer-dark-subtle rounded ps-1 px-1"><br><br>
                <label for="password" class="text-dark">Password: </label><br>
                <input type="password" id="password" name="password" class="user_name border bordeer-dark-subtle rounded ps-1 px-1"><br><br>
                <div class="passcon" id="passcon">
                <button type="submit" class="border border-dark rounded">Login</button><br>
            </form>
            <a href="index.php">Register here</a>
        </div>
        <script src="script.js"></script>
    </body>
</html>