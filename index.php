
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

                
                <div class="my-3">
                    <input type="checkbox" name="number" id="number">
                    <label for="number">Numeri</label>
                    
                    <input type="checkbox" name="letter" id="letter">
                    <label for="letter">Lettere</label>
                    
                    <input type="checkbox" name="symbol" id="symbol">
                    <label for="symbol">Simboli</label>
                    
                    <input type="checkbox" name="duplicate" id="duplicate">
                    <label for="duplicate">Duplicati</label>
                </div>

                <input type="submit" value="Invia">
            </form>


            <!-- IMPLEMENTAZIONE PHP -->
            <?php
                
                //prendo la lunghezza
                $lunghezza = $_GET["lunghezza"] ?? -1;

                //prendo numeri,lettere,simboli,duplicati
                $number = isset($_GET["number"]);
                $letter = isset($_GET["letter"]);
                $symbol = isset($_GET["symbol"]);  
                $duplicate = isset($_GET["duplicate"]);
                

                // PRIMA VERSIONE

                // $passwordGenerata = generatorePasswordCasuale();
                // echo "$passwordGenerata";

                // if (isset($_GET['lunghezza'])) {

                    // prende il "numero della lunghezza"
                    // $lunghezzaPassword = $_GET['lunghezza'];


                    // la lunghezza deve essere maggiore/uguale ad 8
                    // if($lunghezzaPassword >= 8 && $lunghezzaPassword <= 12){
                        
                        // geneara password casuale
                        // $passwordGenerata = generatorePasswordCasuale($lunghezzaPassword);

                        // $_SESSION["passwordGenerata"] = $passwordGenerata;
                        // header('Location: ./password.php');


                    // }else {

                    //     echo "<p class='text-danger'>La lunghezza della password deve essere almeno di 8 caratteri e non più lunga di 12.</p>";

                    // }
                    // stampa la password
                    // echo "LA TUA PASSWORD:" . $passwordGenerata;
                // }

              
                //SECONDA VERSIONE 
                if ($lunghezza >= 8 && $lunghezza <= 12) {

                    // genera e salva la password nella sessione
                    $_SESSION["password"] = prendiPwsAvanzata($lunghezza, $number, $letter, $symbol, $duplicate);
                
                    // reindirizza alla pagina password
                    header("Location: ./password.php");

                } else {

                    echo "<p class='text-danger'>La lunghezza della password deve essere almeno di 8 caratteri e non più lunga di 12.</p>";
                }
                    
            ?>

            

        </div>
        

    </body>
    </html>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
            text-align: center;
        }

        h3 {
            color: #007bff;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        label {
            font-size: 18px;
            font-weight: bold;
            
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 12px 60px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            border-radius: 4px;
        }

        .text-danger {
            color: #dc3545;
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