
    <!-- Creare un form che invii in `GET` la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una *password casuale* (composta da lettere minuscole, lettere maiuscole, numeri e simboli) da restituire all'utente.
    Scriviamo tutto (logica e layout) in un unico file `index.php`. -->
    <!-- Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file `functions.php` che includeremo poi nella pagina principale. -->

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Password</title>

        <?php
            //IMPLEMENTAZIONE PARTIALS
            require_once __DIR__ . "/partials/functions.php";

            session_start();
        ?>

    </head>
    <body>

        <div class="container">

            <h3>PASSWORD GENERATOR</h3>

            <form class="mt-5">
                <label for="password">Lunghezza password:</label>
                <input type="text" name="lunghezza">
                <input type="submit" value="Invia">
            </form>


            <!-- IMPLEMENTAZIONE PHP -->
            <?php

                // $passwordGenerata = generatorePasswordCasuale();
                // echo "$passwordGenerata";

                if (isset($_GET['lunghezza'])) {

                    // prende il "numero della lunghezza"
                    $lunghezzaPassword = $_GET['lunghezza'];

                    // la lunghezza deve essere maggiore/uguale ad 8
                    if($lunghezzaPassword >= 8 && $lunghezzaPassword <= 12){
                        
                        // geneara password casuale
                        $passwordGenerata = generatorePasswordCasuale($lunghezzaPassword);

                        $_SESSION["passwordGenerata"] = $passwordGenerata;
                        header('Location: ./password.php');


                    }else {

                        echo "<p class='text-danger'>La lunghezza della password deve essere almeno di 8 caratteri e non più lunga di 12.</p>";

                    }
                    // stampa la password
                    // echo "LA TUA PASSWORD:" . $passwordGenerata;

                } else {

                    echo "<p class='text-warning'>Lunghezza della password non specificata.</p>";
                }


            ?>

           

        </div>
        

    </body>
    </html>

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
            text-align: center;
        }

        h3 {
            color: #007bff;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
        }

        label {
            font-size: 18px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .text-danger, .text-warning {
            font-size: 16px;
            font-weight: bold;
            margin-top: 15px;
        }

        h6 {
            font-size: 24px;
            font-weight: bold;
            color: #28a745;
            margin-top: 20px;
        }
    </style>