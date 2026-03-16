<?php
    // functie: formulier en database insert fiets
    // auteur: Yusuf

    echo "<h1>Insert Bier</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertRecord($_POST) == true){
            echo "<script>alert('bier is toegevoegd')</script>";
        } else {
            echo '<script>alert("bier is NIET toegevoegd")</script>';
        }
    }

    // Haal bieren op voor dropdown
    $brouwcodes = getBrouwcodes();
?>
<html>
    <body>
        <form method="post">

        <label for="biercode">Biercode:</label>
        <input type="number" id="biercode" name="biercode" required><br>

        <label for="naam">naam:</label>
        <input type="text" id="naam" name="naam" required><br>

        <label for="soort">Soort:</label>
        <input type="text" id="soort" name="soort" required><br>

        <label for="stijl">Stijl:</label>
        <input type="text" id="stijl" name="stijl" required><br>

        <label for="alcohol">Alcohol:</label>
        <input type="text" id="alcohol" name="alcohol" required><br>

        <label for="brouwcode">Choose a brouwnaam:</label>
        <select id="brouwcode" name="brouwcode" required>
            <option value="">-- Kies een brouwnaam --</option>
            <?php foreach($brouwcodes as $bc): ?>
                <option value="<?php echo $bc['brouwcode']; ?>">
                    <?php echo $bc['naam']; ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>
