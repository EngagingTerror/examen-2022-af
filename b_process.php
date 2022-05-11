<?php 


$mysqli = new mysqli('localhost', 'root', '', 'taste1') or die (mysqli_error($mysqli));

$bestelling_id = 0;
$update = false;
$tafel_nr = '';
$Eten = '';
$drinken = '';
$prijs_eten = '';
$prijs_drinken = '';
$totaal_prijs = '';
$Bestel_tijd = '';	

//save knop bestelling
if (isset($_POST['save'])){
    $tafel_nr= $_POST['tafel_nr'];
    $Eten= $_POST['Eten'];
    $drinken= $_POST['drinken'];
    $prijs_eten= $_POST['prijs_eten'];
    $prijs_drinken= $_POST['prijs_drinken'];
    $totaal_prijs= $_POST['totaal_prijs'];
    $Bestel_tijd= $_POST['bestel_tijd'];

    $mysqli->query("INSERT INTO bestelling (tafel_nr, Eten, drinken, prijs_eten, prijs_drinken, totaal_prijs, bestel_tijd) VALUES( '$tafel_nr', '$Eten', '$drinken', '$prijs_eten', '$prijs_drinken', '$totaal_prijs', '$Bestel_tijd')") or die ($mysqli->error());

    header("location: bestelling.php");

}
//delete knop bestelling
if (isset($_GET['delete'])) {
    $bestelling_id = $_GET['delete'];
    $mysqli->query("DELETE FROM bestelling WHERE bestelling_id=$bestelling_id") or die ($mysqli->error());

    header("location: bestelling.php");
}

//edit data bestelling
if (isset($_GET['edit'])) {
    $bestelling_id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM bestelling WHERE $bestelling_id=bestelling_id") or die ($mysqli->error());
    if ($result->num_rows){
        $row = $result->fetch_array();
        $tafel_nr= $row['tafel_nr'];
        $Eten= $row['Eten'];
        $drinken= $row['drinken'];
        $prijs_eten= $row['prijs_eten'];
        $prijs_drinken= $row['prijs_drinken'];
        $totaal_prijs= $row['totaal_prijs'];
        $Bestel_tijd= $row['bestel_tijd'];
    }
    
    }
    //update data bestelling
    if (isset($_POST['update'])) {
    $bestelling_id = $_POST['bestelling_id'];
    $tafel_nr= $_POST['tafel_nr'];
    $Eten= $_POST['Eten'];
    $drinken= $_POST['drinken'];
    $prijs_eten= $_POST['prijs_eten'];
    $prijs_drinken= $_POST['prijs_drinken'];
    $totaal_prijs= $_POST['totaal_prijs'];
    $Bestel_tijd= $_POST['bestel_tijd'];
        
    $mysqli->query("UPDATE bestelling SET tafel_nr='$tafel_nr', Eten='$Eten', drinken='$drinken', prijs_eten='$prijs_eten', prijs_drinken ='$prijs_drinken', totaal_prijs ='$totaal_prijs', bestel_tijd='$Bestel_tijd' WHERE bestelling_id=$bestelling_id") or die ($mysqli->error());
        
        
    header("location: bestelling.php");
    }

//excel export bon
$output = '';
if (isset($_POST["bon"])) {
    $query = "SELECT * FROM bestelling ORDER BY bestelling_id DESC LIMIT 1";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        $output .= '
   <table class="table" bordered="1">  
   <thead>
   <tr>
       <th>tafel nr</th>
       <th>Eten</th>
       <th>drinken</th>
       <th>prijs eten</th>
       <th>prijs drinken</th>
       <th>totaal_prijs</th>
       <th>bestel tijd</th>
   </tr>
   </thead>
  ';
        $row = $result->fetch_assoc(); {
            $output .= '
   <tr>
   <td>' . $row['tafel_nr'] . '</td>
   <td>' . $row['Eten'] . '</td>
   <td>' . $row['drinken'] . '</td>
   <td>' . $row['prijs_eten'] . '</td>
   <td>' . $row['prijs_drinken'] . '</td>
   <td>' . $row['totaal_prijs'] . '</td>
   <td>' . $row['bestel_tijd'] . '</td>      
   ';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=bon.xls');
        echo $output;
    }
}