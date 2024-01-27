<?php


    // PRIMA VERSIONE
    // funzione che genera password casuale
    // function generatorePasswordCasuale($lunghezza){

        //caratteri
        // $caratteri = 'qwertyuiopasdfghjklzxcvbnmABCDEFGHILMOPQRSTUVZ123456789+-*';

        //mescola i caratteri
        // $caratteriMescolati = str_shuffle($caratteri);

        //genera stringa password
        // $passwordCasuale = substr($caratteriMescolati, 0 ,$lunghezza);

        // ritorna password
    //     return $passwordCasuale;
    // }

    // SECONDA VERSIONE 
    function prendiPws($lunghezza){

        //imposto stringa caratteri vuota
        $setDiCaratteri = "";

        //NB. ord: restituisce il valore ASCII di un carattere
        for ($x = ord('a'); $x <= ord('z'); $x++){
            //chr: converte un valore ASCII in un carattere
            $setDiCaratteri .= chr($x);
        } 
        for ($x = ord('A'); $x <= ord('Z'); $x++){
            //chr: converte un valore ASCII in un carattere
            $setDiCaratteri .= chr($x);
        }
        for ($x = ord('0'); $x <= ord('9'); $x++){
            //chr: converte un valore ASCII in un carattere
            $setDiCaratteri .= chr($x);
        }
        for ($x = ord('!'); $x <= ord('/'); $x++){
            //chr: converte un valore ASCII in un carattere
            $setDiCaratteri .= chr($x);
        } 

        //stringa vuota della password
        $password = "";
        for ($x = 0; $x < $lunghezza; $x++){
            //creo variabile per generare i caratteri in modo randomico
            $randomIndiceCarattere = rand(0, strlen($setDiCaratteri)-1);
            //genero i caratteri randomici
            $caratteriRandom = $setDiCaratteri[$randomIndiceCarattere];
            //riempio la stringa vuota della password con i caratteri random
            $password .= $caratteriRandom;
        }

        return $password;
    }


    function prendiPwsAvanzata($lunghezza, $number, $letter, $symbol, $duplicate){

        $setDiCaratteri = "";

        //se le letter sono selezionate
        if($letter){

            for ($x=ord('a');$x<=ord('z');$x++) {

                $setDiCaratteri .= chr($x);
            }
            for ($x=ord('A');$x<=ord('Z');$x++) {
    
                $setDiCaratteri .= chr($x);
            }

        }

        //se i numeri sono selezionati
        if ($number) {

            for ($x=ord('0');$x<=ord('9');$x++) {

                $setDiCaratteri .= chr($x);
            }
        }

        //se i simboli sono selezionati
        if($symbol){

            for ($x=ord('!');$x<=ord('/');$x++) {

                $setDiCaratteri .= chr($x);
            }

        }

        $password = "";

        //genero un ciclo while che continua fino a quando la lunghezza di $password è inferiore alla lunghezza desiderata 
        while(strlen($password) < $lunghezza){

            //creo variabile per generare i caratteri in modo randomico
            $randomIndiceCarattere = rand(0, strlen($setDiCaratteri)-1);
            //genero i caratteri randomici
            $caratteriRandom = $setDiCaratteri[$randomIndiceCarattere];

            if(strpos($password,$caratteriRandom) != false && !$duplicate){

                continue;

            }

            $password .= $caratteriRandom;
        }

        return $password;
    }
        
?>