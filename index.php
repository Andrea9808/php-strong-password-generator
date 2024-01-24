<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Password</title>
</head>
<body>

    <!-- Creare un form che invii in `GET` la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una *password casuale* (composta da lettere minuscole, lettere maiuscole, numeri e simboli) da restituire all'utente.
    Scriviamo tutto (logica e layout) in un unico file `index.php`. -->
    
    <div class="container">

        <h3>PASSWORD GENERATOR</h3>

        <form class="mt-5">
            <label for="password">Scegli la lunghezza della password:</label>
            <input type="text" name="lunghezza">
            <input type="submit" value="Invia">
        </form>

        <?php echo "<h6>" . "LA TUA PASSWORD:" . $passwordGenerata;  "</h6>" ?>
    </div>
    
    <!-- IMPLEMENTAZIONE PHP -->
    <?php

        function generatorePasswordCasuale($lunghezza){

            //caratteri
            $caratteri = 'qwertyuiopasdfghjklzxcvbnmABCDEFGHILMOPQRSTUVZ123456789+-*';

            //mescola i caratteri
            $caratteriMescolati = str_shuffle($caratteri);

            //genera stringa password
            $passwordCasuale = substr($caratteriMescolati, 0 ,$lunghezza);

            return $passwordCasuale;
        }

        // $passwordGenerata = generatorePasswordCasuale();
        // echo "$passwordGenerata";

        if (isset($_GET['lunghezza'])) {

            // prende il "numero della lunghezza"
            $lunghezzaPassword = $_GET['lunghezza'];
    
            // geneara password casuale
            $passwordGenerata = generatorePasswordCasuale($lunghezzaPassword);
    

        } else {

            echo "Lunghezza della password non specificata.";
        }

    ?>


</body>
</html>