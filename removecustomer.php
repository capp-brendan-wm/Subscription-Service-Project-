<html>
<head>
    <title>Rokuhara</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
​
<?php
if(isset($_POST['Remove'])) {
    $dbh = new PDO('mysql:host=localhost;dbname=subscription_service', 'root', 'root');

    $email = $_POST['email'];

    $query = "DELETE FROM subscriptors WHERE email = :email";
    $stmt = $dbh->prepare($query);
    $stmt->execute(array('email' => $email));

    echo '<p style="color: red">Customer has been removed from the Rokuhara subscription service: ' . $email . '</p>';
}
?>

<p style="color: red" align="center">Enter an email address to remove from the subscription service.</p>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
    <label for="email">Email address:</label><br />
    <input id="email" name="email" type="text" size="30" /><br />
    <input type="submit" name="Remove" value="Remove" />
    </fieldset>
</form>

</body>
</html>