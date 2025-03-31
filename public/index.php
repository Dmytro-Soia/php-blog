<?php
require "functions/auth.php";
forced_connection();
require "functions/logout.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
        rel="stylesheet" />
    <title>Home page</title>
</head>

<body>
    <?php require "elements/navbar.php"?>
    <div class="grid-section">
        <div class="post" onclick="window.location.href='postDetail.php'">
            <h2 class="post-title">New post TITLE</h2>
            <img src="/images/pexels-pixabay-147411.jpg" class="post-photo" />
            <div class="content">
                <p class="content-text">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste,
                    sint provident. Esse optio recusandae repellendus deserunt fugit,
                    nemo odit autem, eum praesentium ipsa saepe libero odio facilis, sit
                    accusantium consequuntur.
                </p>
            </div>
        </div>

        <div class="post" onclick="window.location.href='postDetail.php'">
            <h2 class="post-title">New post TITLE</h2>
            <img src="/images/pexels-pixabay-147411.jpg" class="post-photo" />
            <div class="content">
                <p class="content-text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure velit,
                    dolore hic amet molestias quam nihil, modi temporibus totam, ratione ab
                    aliquid dicta error eos odit sunt suscipit! Enim, illo.
                </p>
            </div>
        </div>

        <div class="post" onclick="window.location.href='postDetail.php'">
            <h2 class="post-title">New post TITLE</h2>
            <img src="/images/pexels-pixabay-147411.jpg" class="post-photo" />
            <div class="content">
                <p class="content-text">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, a cum.
                    Dicta voluptates maiores officia dolorum? Eaque dicta labore iure, ex,
                    nam necessitatibus voluptatem laborum pariatur natus non similique.
                    Nulla!
                </p>
            </div>
        </div>

        <div class="post" onclick="window.location.href='postDetail.php'">
            <h2 class="post-title">New post TITLE</h2>
            <img src="/images/pexels-pixabay-147411.jpg" class="post-photo" />
            <div class="content">
                <p class="content-text">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corporis,
                    error et eos adipisci itaque quaerat incidunt, cumque perspiciatis
                    nulla aliquam alias omnis iusto sunt aspernatur perferendis
                    necessitatibus modi. Eum, consequatur!
                </p>
            </div>
        </div>
    </div>
    <a href="postCreation.php">Post creation</a>
    <a href="postEdition.php">Post edition</a>
    <a href="login.php">Login page</a>
    <a href="register.php">Register page</a>
    <a href="postDetail.php">Post detail</a>
    <a href="index.php">Index</a>
</body>

</html>