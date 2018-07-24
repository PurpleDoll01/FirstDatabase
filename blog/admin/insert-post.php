<?php

$result = false;

if(!empty($_POST)) {
    $sql = 'INSERT INTO blog_posts (title,content) VALUES (:title, :content)';
    $query = $pdo->prepare($sql);
    $result = $query->execute([
        'title' => $_POST['title'],
        'content' => $_POST['content']
    ]);
    header("refresh: 2; url=insert-post.php");
}

?>

<html>
<head>
    <title>Blog with Platzi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Blog Title</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <h2>New Post</h2>
            <p>
                <a class="btn btn-default" href="posts.php">Back</a>
            </p>
            <?php
                if($result) {
                   echo '<div class="alert alert-success">Post Saved!</div>';
                }
            ?>
            <form action="insert-post.php" method="post">
                <div class="form-group">
                    <label for="inputTitle">Title</label>
                    <input type="text" class="form-control" name="title" id="inputTitle">
                </div>
                <textarea class="form-control" name="content" id="inputContent" rows="5"></textarea>
                <br>
                <input class="btn btn-primary" type="submit" value="Save">
            </form>
        </div>
        <div class="col-md-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac augue suscipit, viverra purus aliquam, convallis justo. Phasellus condimentum justo sed erat ultrices tincidunt. Duis vulputate, mi eget gravida tincidunt, sem diam mattis dolor, eu pharetra eros mi eget ligula. Nunc sed leo vel tellus eleifend dapibus a id est. Cras nulla massa, blandit quis tempor vel, mollis nec dui. Ut eu nulla accumsan, euismod purus eget, vulputate mauris. Nam porttitor, libero a ultricies pellentesque, urna sem tristique neque, quis euismod est ligula in est. Maecenas et feugiat nibh, non congue turpis. Vestibulum eu nulla eget dolor fermentum tempor at et eros. Duis volutpat feugiat venenatis.
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <footer>
                This is a footer<br>
                <a href="admin/index.php">Admin Panel</a>
            </footer>
        </div>
    </div>
</div>
</body>
</html>