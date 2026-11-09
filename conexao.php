<?php
$conn = mysqli_connect(getenv('DB_HOST') ?: 'localhost', getenv('DB_USER') ?: 'root', getenv('DB_PASSWORD') ?: '', getenv('DB_NAME') ?: 'sweetbakerylager');
if ($conn -> connect_error) {
    die("Perda na conexão com banco de dados". $conn -> connect_error);

}
?>