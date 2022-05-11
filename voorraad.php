<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bestellingen</title>
    <center>
    <img src="img\logo.png" width="120" height="120">
        <h3>Welkom op de voorraad pagina</h3>
        <p>de voorraad moet handmatig aangepast worden per bestelling.</p>
        <a href="bestelling.php">bestellingen</a>
        <a href="reservering.php">reserveren</a>
        <a href="bar.php">bar</a>
        <a href="keuken.php">keuken</a>
        <a href="voorraad.php">voorraad</a>
        <a href="menu.php">menu</a>
        <a href="logout.php">Loguit</a>
</center>
</head>
<body>
    <br></br>
    <?php require_once 'v_process.php' ?>

    <?php 
    $mysqli = new mysqli('localhost', 'root', '','taste1') or die (mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM voorraad") or die ($mysqli->error);
    ?>
    <center>
    <Table>
        <thead>
        <?php while ($row = $result->fetch_assoc()):?>
            <tr>
                <th>aantal:</th>
                <td><?php echo $row['aantal'];?></td>
                <th>product:</th>
                <td><?php echo $row['product'];?></td>
                <th>type product:</th>
                <td><?php echo $row['type_product'];?></td>
                <th colspan="2">Action</th>
                <td>
                     <a href="voorraad.php?edit=<?php echo $row['voorraad_id']; ?>">edit</a>
                    <a href="v_process.php?delete=<?php echo $row['voorraad_id']; ?>">delete</a>
                </td>
            </tr>
        </thead>
        <?php endwhile; ?>
        </Table>
        </center>
    <form action="v_process.php" method="post">
        <input type="hidden" name="voorraad_id" value="<?php echo $voorraad_id;?>">
    <center>
        <label>aantal</label>
        <input type="text" name="aantal" value="<?php echo $aantal;?>" placeholder="aantal">
        <label>product</label>
        <input type="text" name="product" value="<?php echo $product;?>" placeholder="product">
        <label>Type</label>
        <select name="type_product">
            <option value="voedsel">voedsel</option>
            <option value="dranken">dranken</option>
        </select>
        <?php
        if ($update == true) :
        ?>
        <button type="submit" name="update">Update</button>
        <?php else : ?>
        <button type="submit" name="save">save</button>
        <?php endif; ?>
    </center>
    </form>
   </body>
</html>