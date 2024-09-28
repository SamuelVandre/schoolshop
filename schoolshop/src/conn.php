<?php
    $conn = mysqli_connect('localhost', 'root', '', 'schoolshop');
    if (!$conn)
        die("Problemas na conexão com banco de dados " . mysqli_connect_error());
?>