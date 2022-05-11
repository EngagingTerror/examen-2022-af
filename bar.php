<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bar</title>
    <center>
    <img src="img\logo.png" width="120" height="120">
        <h3>Welkom op de bar pagina</h3>
        <p>Bestelde dranken.</p>
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
                <th>drinken:</th>
                <td><?php echo $row['drinken'];?></td>
                <th>prijs drinken:</th>
                <td><?php echo $row['prijs_drinken'];?></td>
                <th>bestel tijd:</th>
                <td><?php echo $row['bestel_tijd'];?></td>
            </tr>
        </thead>
        <?php endwhile; ?>
    </table>
    </center>
</body>
</html>