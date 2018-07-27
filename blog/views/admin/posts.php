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
            <p>
                <a class="btn btn-primary" href="<?php echo BASE_URL; ?>admin/posts/create">New Post</a>
            </p>
            <h2>Posts</h2>
            <table class="table">
                <tr>
                    <th>Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                <?php
                foreach ($blogPosts as $blogPost) {
                    echo '<tr>';
                    echo '<td>' . $blogPost['title'] . '</td>';
                    echo '<td>Edit</td>';
                    echo '<td>Delete</td>';
                    echo '</tr>';
                }
                ?>
            </table>
        </div>
        <div class="col-md-4">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ac augue suscipit, viverra purus aliquam, convallis justo. Phasellus condimentum justo sed erat ultrices tincidunt. Duis vulputate, mi eget gravida tincidunt, sem diam mattis dolor, eu pharetra eros mi eget ligula. Nunc sed leo vel tellus eleifend dapibus a id est. Cras nulla massa, blandit quis tempor vel, mollis nec dui. Ut eu nulla accumsan, euismod purus eget, vulputate mauris. Nam porttitor, libero a ultricies pellentesque, urna sem tristique neque, quis euismod est ligula in est. Maecenas et feugiat nibh, non congue turpis. Vestibulum eu nulla eget dolor fermentum tempor at et eros. Duis volutpat feugiat venenatis.
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <footer>
                This is a footer<br>
                <a href="<?php echo BASE_URL; ?>admin">Admin Panel</a>
            </footer>
        </div>
    </div>
</div>
</body>
</html>