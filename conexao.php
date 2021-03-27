<?php
$conn = mysqli_connect('us-cdbr-east-03.cleardb.com','bc472a8805b2f2','e316d5b2','heroku_0194e96fb8a187f');
if ($conn -> connect_error) {
    die("Perda na conexão com banco de dados". $conn -> connect_error);

}
?>