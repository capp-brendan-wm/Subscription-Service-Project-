<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <title>Rokuhara</title>
</head>
<body>

<div>
    <header>
        <a id="logo" href="index.php">RH</a>
        <nav>
            <ul>
                <li><a href="index.php" id="current" id="hovereffect">Home</a></li>
                <li><a href="animelist.php" id="hovereffect">Full Anime List</a></li>
                <li><a href="genres.php" id="hovereffect">Genres</a></li>
                <li><a href="signup.php" id="hovereffect">Sign Up</a></li>
                <li><a href="signin.php" id="hovereffect">Sign In</a></li>
            </ul>
        </nav>
    </header>
</div>

<?php
$from = 'rokuhara@test.org';
$subject = $_POST['subject'];
$text = $_POST['mail'];
$output_form = false;

if (isset($_POST['submit'])) {

    if (empty($subject) && empty($text)) {
        echo 'You forgot the email subject and body text.' . '<br />';
        $output_form = true;
    }

    if (empty($subject) && (!empty($text))) {
        echo 'You forgot the email subject.<br />';
        $output_form = true;
    }

    if ((!empty($subject)) && empty($text)) {
        echo 'You forgot the email body text.<br />';
        $output_form = true;
    }

    if ((!empty($subject)) && (!empty($text))) {
        $dbh = new PDO('mysql:host=localhost;dbname=subscription_service', 'root', 'root');

        $query = "SELECT * FROM email_list";
        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $results = $stmt->fetchAll();

        foreach ($results as $row) {
            $to = $row['email'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $msg = "Dear $first_name $last_name,\n$text";
            mail($to, $subject, $msg, 'From:' . $from);
            echo 'Email sent to: ' . $to . '<br />';
        }
    }
}

else {
    $output_form = true;
}

if ($output_form) {
    ?>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="subject">Subject of email:</label><br/>
        <input id="subject" name="subject" type="text" size="30" value="<?php echo $subject; ?>"/><br/>
        <label for="mail">Body of email:</label><br/>
        <textarea id="mail" name="mail" rows="8" cols="40"><?php echo $text; ?></textarea><br/>
        <input type="submit" name="submit" value="Submit"/>
    </form>

    <?php
}
?>

<div id="footer">
    <table align="center">
        <tr align="center">
            <td id="footertext"><a href="aboutus.html">About Us</td>
            <td id="footertext"><a href="support.php">Support</td>
        </tr>
    </table>
</div>

</body>
</html>