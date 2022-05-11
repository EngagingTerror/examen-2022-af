<?php 


$mysqli = new mysqli('localhost', 'root', '', 'taste1') or die (mysqli_error($mysqli));

$reserver_id = 0;
$update = false;
$dag = '';
$klantnaam = '';
$klantemail = '';
$telefoon = '';
$aantal_personen = '';
$reserver_tijd	= '';
$jarige = '';	

//save knop reserveringen
if (isset($_POST['save'])){
    $dag= $_POST['dag'];
    $klantnaam= $_POST['klantnaam'];
    $klantemail= $_POST['klantemail'];
    $telefoon= $_POST['telefoon'];
    $aantal_personen= $_POST['aantal_personen'];
    $reserver_tijd= $_POST['reserver_tijd'];
    $jarige= $_POST['jarige'];

    $mysqli->query("INSERT INTO reserveren (dag, klantnaam, klantemail, telefoon, aantal_personen, reserver_tijd, jarige ) VALUES( '$dag', '$klantnaam', '$klantemail', '$telefoon', '$aantal_personen', '$reserver_tijd', '$jarige')") or die ($mysqli->error());

    header("location: reservering.php");

}
//delete knop reserveringen
if (isset($_GET['delete'])) {
    $reserver_id = $_GET['delete'];
    $mysqli->query("DELETE FROM reserveren WHERE reserver_id=$reserver_id") or die ($mysqli->error());

    header("location: reservering.php");
}

//edit data reserveringen
if (isset($_GET['edit'])) {
    $reserver_id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM reserveren WHERE $reserver_id=reserver_id") or die ($mysqli->error());
    if ($result->num_rows){
        $row = $result->fetch_array();
        $dag= $row['dag'];
        $klantnaam= $row['klantnaam'];
        $klantemail= $row['klantemail'];
        $telefoon= $row['telefoon'];
        $aantal_personen= $row['aantal_personen'];
        $reserver_tijd= $row['reserver_tijd'];
        $jarige= $row['jarige'];
    }
    
    }
    //update data reserveringen
    if (isset($_POST['update'])) {
        $reserver_id = $_POST['reserver_id'];
        $dag= $_POST['dag'];
        $klantnaam= $_POST['klantnaam'];
        $klantemail= $_POST['klantemail'];
        $telefoon= $_POST['telefoon'];
        $aantal_personen= $_POST['aantal_personen'];
        $reserver_tijd= $_POST['reserver_tijd'];
        $jarige= $_POST['jarige'];
    
        $mysqli->query("UPDATE reserveren SET dag='$dag', klantnaam='$klantnaam', klantemail='$klantemail', telefoon ='$telefoon', aantal_personen='$aantal_personen', reserver_tijd='$reserver_tijd', jarige='$jarige' WHERE reserver_id=$reserver_id") or die ($mysqli->error());
    
    
        header("location: reservering.php");
    }