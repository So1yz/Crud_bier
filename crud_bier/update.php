<?php
    // functie: update bier
    // auteur: yusuf

    require_once('functions.php');

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateRecord($_POST) == true){
            echo "<script>alert('bier is gewijzigd')</script>";
        } else {
            echo '<script>alert("bier is NIET gewijzigd")</script>';
        }
    }

    // Test of brouwcode is meegegeven in de URL
    if(isset($_GET['brouwcode'])){  
        // Haal alle info van de betreffende brouwcode $_GET['brouwcode']
        $brouwcode = $_GET['brouwcode'];
        $row = getRecord($brouwcode);

        // Haal bieren op voor dropdown
        $brouwcodes = getBrouwcodes();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Update Bier</title>
</head>
<body>
  <h2>Update Bier</h2>
  <form method="post">
    
    <input type="hidden" name="brouwcode" value="<?php echo $row['biercode']; ?>">

    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <label for="soort">Soort:</label>
    <input type="text" id="soort" name="soort" required value="<?php echo $row['soort']; ?>"><br>

    <label for="stijl">Stijl:</label>
    <input type="text" id="stijl" name="stijl" required value="<?php echo $row['stijl']; ?>"><br>

    <label for="alcohol">Alcohol:</label>
    <input type="text" id="alcohol" name="alcohol" required value="<?php echo $row['alcohol']; ?>"><br>

    <label for="brouwcode_select">Choose a brouwnaam:</label>
    <select id="brouwcode_select" name="brouwcode_select">
        <option value="">-- Kies een brouwnaam --</option>
        <?php foreach($brouwcodes as $bc): ?>
            <option value="<?php echo $bc['brouwcode']; ?>"
                <?php echo ($bc['brouwcode'] == $row['brouwcode']) ? 'selected' : ''; ?>>
                <?php echo $bc['naam']; ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" name="btn_wzg" value="Wijzigen">
  </form>
  <br><br>
  <a href='index.php'>Home</a>
</body>
</html>

<?php
    } else {
        echo "Geen brouwcode opgegeven<br>";
    }
?>
