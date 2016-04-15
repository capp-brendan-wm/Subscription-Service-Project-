<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rokuhara-Sign In</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>

<div>
    <header>
        <a id="logo" href="index.php">RH</a>
        <nav>
            <ul>
                <li><a href="index.php" id="hovereffect">Home</a></li>
                <li><a href="animelist.php" id="hovereffect">Full Anime List</a></li>
                <li><a href="genres.php" id="hovereffect">Genres</a></li>
                <li><a href="signup.php" id="hovereffect">Sign Up</a></li>
                <li><a href="signin.php" id="current" id="hovereffect">Sign In</a></li>
            </ul>
        </nav>
    </header>
</div>


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Registration Info</legend>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" /><br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" /><br />
    </fieldset>
    <input type="submit" value="Sign In" name="submit" />
</form>

</body>
</html>