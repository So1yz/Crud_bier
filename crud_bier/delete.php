<?php
// auteur: Yusuf
// functie: verwijder een bier op basis van de id
include 'functions.php';

// Haal bier uit de database
if(isset($_GET['brouwcode'])){

    // test of insert gelukt is
    if(deleteRecord($_GET['brouwcode']) == true){
        echo '<script>alert("Biercode: ' . $_GET['brouwcode'] . ' is verwijderd")</script>';
        echo "<script> location.replace('index.php'); </script>";
    } else {
        echo '<script>alert("Bier is NIET verwijderd")</script>';
    }
}
?>

