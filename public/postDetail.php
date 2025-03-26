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
    <title>Post Detail</title>
</head>

<body>
    <header class="header">
        <div class="header-left">
            <button class="button button-manage" onclick="window.location.href='index.php'">Home Page</button>
            <button class="button button-manage" onclick="window.location.href='postCreation.php'">Create New Post</button>
        </div>
        <button class="button button-logout" id="logout">Log Out</button>
    </header>
    <img src="images/pexels-pixabay-147411.jpg" class="photo-in-detail" alt="Post Image" />

    <div class="post-in-detail">
        <h1 class="title-in-detail">Title</h1>
        <p class="content-text-in-detail">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam aliquid sit quas distinctio officia,
            tenetur voluptas laudantium doloribus culpa iste illo, tempora velit reiciendis excepturi natus odio totam
            deserunt quos? <br />
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus velit quae aut eos distinctio, sint
            dolorem porro aliquam quisquam. Dolorem enim labore eveniet dolore autem hic doloremque sit doloribus
            numquam? <br />
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim dignissimos repudiandae voluptate rem odio
            excepturi aspernatur voluptas molestiae amet fuga vitae, inventore voluptatibus aliquam, debitis, cum
            molestias consequatur tenetur modi! <br />
        </p>
    </div>
    <a href="postCreation.php">Post Creation</a>
    <a href="postEdition.php">Post Edition</a>
    <a href="login.php">Login Page</a>
    <a href="register.php">Register Page</a>
    <a href="postDetail.php">Post Detail</a>
    <a href="index.php">Index</a>
</body>

</html>