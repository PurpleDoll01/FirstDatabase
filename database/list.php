<?php

require_once 'config.php';

$queryResult = $pdo->query("SELECT * FROM users");

?>

<html>
<head>
    <title>Databases with Platzi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>List Users</h1>
    <a href="index.php">Home</a>
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        while($row = $queryResult->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['email'] . '</td>';
            echo '<td><a href="update.php?id=' . $row['id'] . '">Edit</a></td>';
            echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
            echo '</tr>';
        }
        ?>
    </table>
</div>
</body>
</html>