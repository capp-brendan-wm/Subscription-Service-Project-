<?php
if(isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    if(!empty($full_name) && !empty($user_name) && !empty($password) && !empty($email)) {

        $dbh = new PDO('mysql:host=localhost;dbname=subscription_service', 'root', 'root');

        $query = "INSERT INTO subscriptors VALUES (0, :full_name, :user_name, :password, :email)";

        $stmt = $dbh->prepare($query);
        $result = $stmt->execute(
            array(
                'full_name' => $full_name,
                'user_name' => $user_name,
                'password' => $password,
                'email' => $email
            )
        );
        if (!$result) {
            die('Error querying database.');
        }
        else {
            echo 'Subscriber added.';
        }
    }
    else {
        echo '<p>Please enter missing information</p>';
    }
}

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Rokuhara-Sign Up</title>
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
                <li><a href="signup.php" id="current" id="hovereffect">Sign Up</a></li>
                <li><a href="signin.php" id="hovereffect">Sign In</a></li>
            </ul>
        </nav>
    </header>
</div>
<div>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
        <legend>Registration Info</legend>
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?php if (!empty($fullname)) echo $fullname; ?>" /><br />
        <label for="user_name">Username:</label>
        <input type="text" id="user_name" name="user_name" /><br />
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" /><br />
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" /><br />
    </fieldset>
    <input type="submit" value="submit" name="submit" />
</form>

</div>
</body>
</html>