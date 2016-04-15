<?php
require_once('authorize.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rokuhara</title>
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
<h2>Rokuhara Subscribers</h2>
<p style="color: red">Below is a list of all members who have subscribed to this service. <button><a href="removecustomer.php">Remove a subscriber</a></button></p>
<hr/>

<?php

$dbh = new PDO('mysql:host=localhost;dbname=subscription_service', 'root', 'root');

// Retrieve the score data from MySQL
$query = "SELECT * FROM subscriptors ORDER BY date ASC";
$stmt = $dbh->prepare($query);
$stmt->execute();
$result = $stmt->fetchAll();

// Loop through the array of score data, formatting it as HTML
echo '<table id="genre">';
echo '<tr><th>Full Name</th><th>Username</th><th>Email</th></tr>';
foreach($result as $row) {
    echo '<tr><td>' . $row['full_name'] . '</td>';
    echo '<td>' . $row['user_name'] . '</td>';
    echo '<td>' . $row['email'] . '</td>';
}
echo '</table>';
?>

</body>
</html>