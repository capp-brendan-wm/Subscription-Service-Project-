<?php

/*** mysql hostname ***/
$hostname = '127.0.0.1';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'root';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=subscription_service", $username, $password);
    /*** echo a message saying we have connected ***/
}
catch(PDOException $e)
{
}
$stmt = $dbh->prepare("SELECT * FROM genres a WHERE a.type = :genres");
$stmt->execute(array(':genres'=>$_GET['genres']));
$results = $stmt->fetchAll();

?>
<!DOCTYPE html>

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
                <li><a href="index.php" id="hovereffect">Home</a></li>
                <li><a href="animelist.php" id="hovereffect">Full Anime List</a></li>
                <li><a href="genres.php" id="current" id="hovereffect">Genres</a></li>
                <li><a href="signup.php" id="hovereffect">Sign Up</a></li>
                <li><a href="signin.php" id="hovereffect">Sign In</a></li>
            </ul>
        </nav>
    </header>
</div>

<div id="searchinfo">
    <h1><?php echo $_GET['genres'];?></h1>

    <table>
        <thead>
        <tr>
            <th>Name</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(count($results) > 0) {
            foreach($results as $genre){

                $genretype = $genre['name'];

                echo '<tr>';
                echo "<td><a href='genre.php?id=" . $genre['id'] . "'>{$genretype}</a></td>";
                echo '</tr>';
            }
        }
        else{
            echo '<tr>';
            echo '<td>0 Results Found.</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <?php

    ?>
</div>
</body>

