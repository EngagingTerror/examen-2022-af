<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bestellingen</title>
    <center>
    <img src="img\logo.png" width="120" height="120">
    <h3>Welkom op de menu pagina</h3>
        <p>Het menu kan hier aangepast worden vergeet dan niet het bestel systeem aan te passen.</p>
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
    <?php require_once 'm_process.php' ?>

    <?php 
    $mysqli = new mysqli('localhost', 'root', '','taste1') or die (mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM menu") or die ($mysqli->error);
    ?>
    <center>
    <Table>
        <thead>
        <?php while ($row = $result->fetch_assoc()):?>
            <tr>
                <th>eten:</th>
                <td><?php echo $row['eten'];?></td>
                <th>drinken:</th>
                <td><?php echo $row['drinken'];?></td>
                <th>prijs:</th>
                <td><?php echo $row['prijs'];?></td>
                <th colspan="2">Action</th>
                <td>
                    <a href="menu.php?edit=<?php echo $row['menu_id']; ?>">edit</a>
                    <a href="m_process.php?delete=<?php echo $row['menu_id']; ?>">delete</a>
                </td>
            </tr>
        </thead>
        <?php endwhile; ?>
    </Table>
    </center>
    <form action="m_process.php" method="post">
        <input type="hidden" name="menu_id" value="<?php echo $menu_id;?>">
    <center>
        <label>Eten</label>
        <input type="text" name="eten" value="<?php echo $eten;?>" placeholder="eten">
        <label>Drinken</label>
        <input type="text" name="drinken" value="<?php echo $drinken;?>" placeholder="drinken">
        <label>prijs</label>
        <select name="prijs">
            <option value="02.00">02.00</option>
            <option value="05.00">05.00</option>
        </select>
        <?php if ($update == true) :?>
        <button type="submit" name="update">Update</button>
        <?php else : ?>
        <button type="submit" name="save">save</button>
        <?php endif; ?>
    </center>
    </form>
   </body>
</html>