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
    $pass = $_POST["password"];
    if(array_key_exists($user, $user_list)) {
        echo "
            <script>alert('username already exists!');</script>
        ";
    } else {   
        $user_list[$user] = md5($pass, FALSE);
        file_put_contents($file, json_encode($user_list));
        echo "
            <script>alert('Registration Successful!');</script>
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap-5.3.7-dist/css/bootstrap.min.css">
        <title>Register</title>
    </head>
    <body class="b_center">
        <div class="reg_center border border-dark rounded pt-2 ps-3">
        <h2 class="text-center">User Registration</h2><br><br>
            <form method="POST">
                <label for="username" class="text-dark">Username: </label><br>
                <input type="text" id="username" name="username" class="user_name border bordeer-dark-subtle rounded ps-1 px-1" required><br><br>
                <label for="password" class="text-dark">Password: </label><br>
                <input type="password" id="password" name="password" class="user_name border bordeer-dark-subtle rounded ps-1 px-1" required><br><br>
                <div class="passcon" id="passcon">
                    <ul>
                        <li id="textcount">must be at between 8-12 characters</li>
                        <li id="hassymbol">must contain special characters</li>
                    </ul>
                </div>
                <button type="submit" class="border border-dark rounded">Register</button><br>
                <a href="login.php">Login Here</a>
            </form>
        </div>
        <script src="script.js"></script>
    </body>
</html>
