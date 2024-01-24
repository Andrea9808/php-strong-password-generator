<?php

// funzione che genera password casuale
function generatorePasswordCasuale($lunghezza){

    //caratteri
    $caratteri = 'qwertyuiopasdfghjklzxcvbnmABCDEFGHILMOPQRSTUVZ123456789+-*';

    //mescola i caratteri
    $caratteriMescolati = str_shuffle($caratteri);

    //genera stringa password
    $passwordCasuale = substr($caratteriMescolati, 0 ,$lunghezza);

    // ritorna password
    return $passwordCasuale;
}
?>