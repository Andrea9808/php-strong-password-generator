<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>La tua password</title>

    <?php

        require_once __DIR__ . "/partials/functions.php";

        session_start();
        $passwordGenerata = $_SESSION["passwordGenerata"];
    ?>
</head>

    <body>

        <div class="container">
            <h3>La tua password è:</h3>
            <p>
                <?php echo "$passwordGenerata"; ?>
            </p>
        </div>
            
    </body>

</html>

<style>
    .container {
        margin-top: 50px;
        text-align: center; 
    }

    h3 {
        color: #007bff;
    }

    p {
        font-size: 20px; 
        color: #28a745; 
        font-weight: bold; 
    }
    </style>