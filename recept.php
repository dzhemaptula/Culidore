<?php
include('db.php');
session_start();
if ($conn) 
{
if (isset($_SESSION['username']))
{
    $gebruiker = $_SESSION['username'];
    $titel = $_POST['Titel'];
    $omschrijving = $_POST['Omschrijving'];
    $prijs = $_POST['Prijs'];
    $soort = $_POST['Soort'];
    $foto = $_POST['foto'];
    $bereiding = $_POST['Bereiding'];
    $location = "index.php";
    $rating = "0";
    $datum = date("Y-n-d");
    $aantalingredienten = $_POST['aantaling'];
    for($x=1;$x<=$aantalingredienten;$x++){
        $ingredienten[$x] = $_POST['ingredient'.$x];
    }
    $ingredienten=array_unique($ingredienten);
    //fotopath in database
    $filetmp = $_FILES['Foto']['tmp_name'];
    $fname = $_FILES['Foto']['name'];
    $filetype = $_FILES['Foto']['type'];
    $random_number = mt_rand(1000000,99999999);
    $ext = pathinfo($fname, PATHINFO_EXTENSION);
    $random = uniqid($random_number);
    $filename = $random.".".$ext;

    if (empty($fname))
    {
        $filepath = "Default image/geenfoto.png";
    }
    else
    {
    	$filepath = "images/".$filename;
    }
   
	move_uploaded_file($filetmp, $filepath);

    // maak recept aan
    $sql = "INSERT INTO tblrecepten(id, naam, rating, prijs, soort, omschrijving, foto, bereiding, Username, Tijdgeplaatst) VALUES('', '$titel', '$rating', '$prijs', '$soort', '$omschrijving', '$filepath', '$bereiding', '$gebruiker', '$datum')";
    mysqli_query($conn, $sql);

    $idrec = mysqli_insert_id($conn);
    foreach ($ingredienten as $ingredient) {
        $vraag = "select id from Ingredienten where Naam='".$ingredient."'";
        if ($result = mysqli_query($conn, $vraag)) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idinngg = $row['id'];
            }
        }
        else{
            echo "Geen resultaat";
        }

        mysqli_query($conn,"INSERT INTO `Recept-Ingredient`(`id`, `idRecept`, `idIngredient`) VALUES ('',$idrec,$idinngg);");
    }
    // terug naar index pagina
    header('location:index.php?l=1&reto=s');
}
else
{
    //foutcode
    echo "Kan recept niet toevoegen";
}
}
else
{
    mysqli_close($conn);
}
?>