<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilo.css">
  </head>
  <body>
   <table class="container">
   <tr>
        <th>ID</th>
        <th>Descrição</th>
        <th>valor</th>
        <th>quantidade</th>
   
   </tr>
   <?php
$conn = mysqli_connect('us-cdbr-east-03.cleardb.com','bc472a8805b2f2','e316d5b2','heroku_0194e96fb8a187f');
if ($conn -> connect_error) {
    die("Perda na conexão com banco de dados". $conn -> connect_error);

}

mysqli_set_charset($conn , "utf8");

$consulta =  "SELECT id, descricao, valor, quantidade FROM Estoque" ;
$resultado = $conn-> query($consulta);

if ($resultado -> num_rows > 0 ) {
    while ($row = $resultado -> fetch_assoc()){
    echo "<tr><td>". $row["id"] . "</td><td>" . $row["descricao"] . "</td><td>"."R$ " . $row["valor"] .  "</td><td>" . $row["quantidade"] . "</td></tr>";
}

echo "</table>";
} else {
   echo "0 resultado";
}

$conn ->close()


?>
    
   </table>
  </body>
</html>
