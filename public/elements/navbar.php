<header class="header">
        <div class="header-left">
            <button class="button button-manage" onclick="window.location.href='index.php'">Home Page</button>
            <button class="button button-manage" onclick="window.location.href='postCreation.php'">Create New Post</button>
        </div>
        <form action="functions/logout.php" method="post">
            <button type="submit" class="button button-logout" id="logout" name="logout" value="logout">Log Out</button>
        </form>
    </header>