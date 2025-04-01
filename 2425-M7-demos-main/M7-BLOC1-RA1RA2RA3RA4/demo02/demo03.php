<?php

    // FALTARIA AFEGIR QUE CONTROLI ELS NÚMEROS MÀGICS QUE JA HAN SORTIT, I QUE NO EN REPETEIXI POSTERIORMENT: FER COM ELS NÚMEROS JUGATS, PERO QUAN GENERI UN DE NOU, HO PASSI A UN ARRAY (FUNCIÓ EXPLODE) I UN DO-WHILE?

    $final = false;
    $missatge = "";
    $intents = 0;
    if(!isset($_REQUEST['numeroMagic'])) {
        $numeroMagic = rand(0, 10);
    } else {
        $numeroMagic = $_REQUEST['numeroMagic'];
        $num = $_REQUEST['num'];
        $intents = $_REQUEST['intents'];
        $numerosJugats = $_REQUEST['numerosJugats'] . " " . $num;
        // es pot fer una funció gestionarEncert($numeroMagic, $num, $intents) que retorni $final i $missatge, en un array associatiu $resultat['final'] i $resultat['missatge'], per exemple
        if($numeroMagic == $num) {
            $final = true;
            $missatge = "L'has encertat, molt bé!";
        } else if($numeroMagic < $num) {
            $intents++;
            if($intents>=3){
                $final = true;
                $missatge = "T'has quedat sense intents. El número era: $numeroMagic";
            } else
                $missatge = "El número que busques és menor";
        } else {
            $intents++;
            if($intents>=3) {
                $final = true;
                $missatge = "T'has quedat sense intents. El número era: $numeroMagic";
            } else
                $missatge = "El número que busques és major";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número màgic</title>
</head>
<body>

    <?php
    if(!$final){
    ?>

    <form action="" method="GET">
        <input type="hidden" name="numerosJugats" value="<?php echo $numerosJugats; ?>"/>
        <input type="hidden" name="numeroMagic" value="<?php echo $numeroMagic; ?>"/>
        <input type="hidden" name="intents" value="<?php echo $intents; ?>"/>
        Num: <input name="num" size="4" require/><br/><br/>
        <input type="submit" value="Jugar!"/><br/><br/>
    </form>

    <?php
    } else
        echo "<a href='demo03.php'>Tornar a jugar</a><br/><br/>";
    
    echo "Número jugats: $numerosJugats<br/><br/>";
    echo $missatge;
    ?>

</body>
</html>