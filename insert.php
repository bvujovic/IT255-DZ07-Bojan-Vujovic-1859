<?php

header("Content-type: application/json");
if (isset($_POST['id']) && isset($_POST['ime']) && isset($_POST['prezime']) && isset($_POST['prosek'])) {
// preuzimanje argumenata
    $id = htmlspecialchars($_POST['id']);
    $ime = htmlspecialchars($_POST['ime']);
    $prezime = htmlspecialchars($_POST['prezime']);
    $prosek = htmlspecialchars($_POST['prosek']);

// upisivanje novog studenta u fajl
    $imeFajla = "studenti.txt";
    $fp = fopen($imeFajla, "a") or die("Unable to open file!");
    $SEP = "|";
    fwrite($fp, "\r\n$id$SEP$ime$SEP$prezime$SEP$prosek");
    fclose($fp);

    $rez = array(
        'status' => 'OK',
        'poruka' => 'Uspesno kreiranje novog studenta.'
    );
} else {
    $rez = array(
        'status' => 'ERR',
        'poruka' => 'Svi parametri su obavezni.'
    );
}
// vracanje rezultata
echo json_encode($rez);
