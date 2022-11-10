<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Compra</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "loja");

    if($conn){
        echo "Eba, conectei no banco!";
    } else {
        echo "Ops, deu erro!";
    }

    $rsClientes = mysqli_query($conn, "SELECT * FROM clientes");
    $rsProdutos = mysqli_query($conn, "SELECT * FROM produtos");

    $clientes = array();
    $i = 0;
    while($cliente = mysqli_fetch_assoc($rsClientes)){
        $clientes[$i] = $cliente;
        $i++;
    }
        
    $produtos = array();
    $i = 0;
    while($produto = mysqli_fetch_assoc($rsProdutos)){
        $produtos[$i] = $produto;
        $i++;
    } 
    ?>
    <form action="sucesso.php" method="post">
        <label for="cliente">Selecione o cliente: </label>
        <select id="cliente">
        <?php
            foreach($clientes as $c) 
            { ?>
            <option value="<?php echo $c['idcliente'] ?>"><?php echo $c['nomecliente'] ?></option>
            
        <?php }
        ?>
        </select>
        <br>
        <label for="produto">Selecione o produto: </label>
        <select id="produto">
        <?php
            foreach($produtos as $p) 
            { ?>
            <option value="<?php echo $p['idproduto'] ?>"><?php echo $p['nomeproduto'] ?></option>
            
        <?php }
        mysqli_close($conn);
        ?>
        </select>
        <br>
        <label for="quantidade">Digite a quantidade</label>
        <input type="number" id="quantidade">
        <br>
        <input type="submit" value="Enviar dados">
    </form>
</body>
</html>