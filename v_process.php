<?php 


$mysqli = new mysqli('localhost', 'root', '', 'taste1') or die (mysqli_error($mysqli));

$voorraad_id = 0;
$update = false;
$aantal = '';
$product = '';
$type_product = '';	

//save knop voorraad
if (isset($_POST['save'])){
    $aantal= $_POST['aantal'];
    $product= $_POST['product'];
    $type_product= $_POST['type_product'];

    $mysqli->query("INSERT INTO voorraad (aantal, product, type_product) VALUES( '$aantal', '$product', '$type_product')") or die ($mysqli->error());

    header("location: voorraad.php");

}
//delete knop voorraad
if (isset($_GET['delete'])) {
    $voorraad_id = $_GET['delete'];
    $mysqli->query("DELETE FROM voorraad WHERE voorraad_id=$voorraad_id") or die ($mysqli->error());

    header("location: voorraad.php");
}

//edit data voorraad
if (isset($_GET['edit'])) {
    $voorraad_id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM voorraad WHERE $voorraad_id=voorraad_id") or die ($mysqli->error());
    if ($result->num_rows){
        $row = $result->fetch_array();
        $aantal= $row['aantal'];
        $product= $row['product'];
        $type_product= $row['type_product'];
    }
    
    }
    //update data voorraad
if (isset($_POST['update'])) {
    $voorraad_id = $_POST['voorraad_id'];
    $aantal= $_POST['aantal'];
    $product= $_POST['product'];
    $type_product= $_POST['type_product'];
    
    $mysqli->query("UPDATE voorraad SET aantal='$aantal', product='$product', type_product='$type_product' WHERE voorraad_id=$voorraad_id") or die ($mysqli->error());
    
    
    header("location: voorraad.php");
    }