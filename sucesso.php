<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $conn = mysqli_connect("localhost", "root", "", "loja");

    if($conn){
        echo "Eba, conectei no banco!";
    } else {
        echo "Ops, deu erro!";
    }

    $sql = "INSERT INTO compras (idcliente, idproduto, quantidade) VALUES ('1', '1', '2')";
    
    if (mysqli_query($conn, $sql)) {
      echo "Compra realizada com sucesso!";
    } else {
      echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
    ?>
    
</body>
</html>
