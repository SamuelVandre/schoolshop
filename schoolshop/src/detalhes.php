<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include("./conn.php");
    $_GET = $row['id'];
    //testar
    //$_GET['idProd'] = $row['id'];
    $busca = "SELECT * FROM dadosprodutos WHERE id='$_GET'";
    $sql = $conn->query($sql);
    if($sql->num_rows > 0){
        print "Achou";
    }




?>