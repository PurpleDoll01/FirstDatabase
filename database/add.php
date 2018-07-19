<?php
require_once 'config.php';

$result = false;

if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
    $query = $pdo->prepare($sql);
    $result = $query->execute([
        'name' => $name,
        'email' => $email,
        'password' => $password

    ]);
    header("refresh: 1; url=add.php");
}


?>

<html>
<head>
    <title>Databases with Platzi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Add User</h1>
    <a href="index.php">Home</a>
    <?php
    $puta = false;
        if ($result == true) {
            echo '<div class="alert alert-success">Success!!</div>';
            $puta = true;
        }
    ?>
    <form action="add.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
        <br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Save">
    </form>
</div>
</body>
</html>