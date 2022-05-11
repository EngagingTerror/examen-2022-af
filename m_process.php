<?php 


$mysqli = new mysqli('localhost', 'root', '', 'taste1') or die (mysqli_error($mysqli));

$menu_id = 0;
$update = false;
$eten = '';
$drinken = '';
$prijs = '';	

//save knop menu
if (isset($_POST['save'])){
    $eten= $_POST['eten'];
    $drinken= $_POST['drinken'];
    $prijs= $_POST['prijs'];

    $mysqli->query("INSERT INTO menu (eten, drinken, prijs) VALUES( '$eten', '$drinken', '$prijs')") or die ($mysqli->error());

    header("location: menu.php");

}
//delete knop menu
if (isset($_GET['delete'])) {
    $menu_id = $_GET['delete'];
    $mysqli->query("DELETE FROM menu WHERE menu_id=$menu_id") or die ($mysqli->error());

    header("location: menu.php");
}

//edit data menu
if (isset($_GET['edit'])) {
    $menu_id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM menu WHERE $menu_id=menu_id") or die ($mysqli->error());
    if ($result->num_rows){
        $row = $result->fetch_array();
        $eten= $row['eten'];
        $drinken= $row['drinken'];
        $prijs= $row['prijs'];
    }
    
    }
    //update data menu
if (isset($_POST['update'])) {
    $menu_id = $_POST['menu_id'];
    $eten= $_POST['eten'];
    $drinken= $_POST['drinken'];
    $prijs= $_POST['prijs'];
    
    $mysqli->query("UPDATE menu SET eten='$eten', drinken='$drinken', prijs='$prijs' WHERE menu_id=$menu_id") or die ($mysqli->error());
    
    
    header("location: menu.php");
    }