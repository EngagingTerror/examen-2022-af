<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bestellingen</title>
    <center>
    <img src="img\logo.png" width="120" height="120">
        <h3>Welkom op bestellings pagina</h3>
        <p>Neem hier de bestellingen van de klanten op.</p>
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
    <?php require_once 'b_process.php' ?>

    <?php 
    $mysqli = new mysqli('localhost', 'root', '','taste1') or die (mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM bestelling") or die ($mysqli->error);
    ?>
    <center>
    <Table>
        <thead>
            <?php while ($row = $result->fetch_assoc()):?>
            <tr>
                <th>Tafel Nummer:</th>
                <td><?php echo $row['tafel_nr'];?></td>
                <th>eten:</th>
                <td><?php echo $row['Eten'];?></td>
                <th>drinken:</th>
                <td><?php echo $row['drinken'];?></td>
                <th>prijs eten:</th>
                <td><?php echo $row['prijs_eten'];?></td>
                <th>prijs drinken:</th>
                <td><?php echo $row['prijs_drinken'];?></td>
                <th>totaal prijs:</th>
                <td><?php echo $row['totaal_prijs'];?></td>
                <th>bestel tijd:</th>
                <td><?php echo $row['bestel_tijd'];?></td>
                <th colspan="2">Action</th>
                <td>
                    <a href="bestelling.php?edit=<?php echo $row['bestelling_id']; ?>">edit</a>
                    <a href="b_process.php?delete=<?php echo $row['bestelling_id']; ?>">delete</a>
                </td>
            </tr>
        </thead>
        <?php endwhile; ?>
    </Table>
        </center>
    <form action="b_process.php" method="post">
        <input type='submit' name='bon' value='bon to excel file' />
        <input type="hidden" name="bestelling_id" value="<?php echo $bestelling_id;?>">
    <center>
        <label>Tafel Nummer</label>
        <input type="text" name="tafel_nr" value="<?php echo $tafel_nr;?>" placeholder="tafel Nummer">
        <label>Eten</label>
        <select name="Eten">
            <option value="Geen">Geen</option>
            <option value="Hamburger">Hamburger</option>
            <option value="kip">Kip</option>
            <option value="biefstuk">Biefstuk</option>
        </select>
        <label>Drinken</label>
        <select name="drinken">
            <option value="Geen">Geen</option>
            <option value="Cola">Cola</option>
            <option value="Fanta">Fanta</option>
            <option value="Water">Water</option>
        </select>
        <label>Prijs eten</label>
        <select name="prijs_eten">
            <option value="Geen">Geen</option>
            <option value="05.00">05.00</option>
        </select>
        <label>Prijs drinken</label>
        <select name="prijs_drinken">
            <option value="Geen">Geen</option>
            <option value="02.00">02.00</option>
        </select>
        <label>totaal prijs</label>
        <select name="totaal_prijs">
            <option value="07.00">07.00</option>
            <option value="05.00">05.00</option>
            <option value="02.00">02.00</option>
        </select>
        <label>bestel tijd</label>
        <input type="text" name="bestel_tijd" value="<?php echo $Bestel_tijd;?>" placeholder="tijd- 00:00:00">
        <?php if ($update == true) :?>
        <button type="submit" name="update">Update</button>
        <?php else : ?>
        <button type=" submit" name="save">save</button>
        <?php endif; ?>
    </center>
    </form>
   </body>
</html>