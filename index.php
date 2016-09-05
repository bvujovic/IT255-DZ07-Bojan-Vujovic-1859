<?php

// preuzimanje argumenata
$id = $_GET['id'];

// citanje fajla sa podacima
$imeFajla = "studenti.txt";
$fp = fopen($imeFajla, "r") or die("Unable to open file!");
$sadrzaj = fread($fp, filesize($imeFajla));
fclose($fp);

// pretraga
$redovi = explode(PHP_EOL, $sadrzaj);
for ($i = 0; $i < count($redovi); $i++) {
    $delovi = explode("|", $redovi[$i]);
    if ($delovi[0] == $id) {
        $ime = $delovi[1];
        $prezime = $delovi[2];
        $prosek = $delovi[3];
    }
}

// vracanje rezultata
header("Content-type: application/json");
if ($ime != "") {
    $rez_niz = array(
        'poruka' => 'OK',
        'ime' => $ime,
        'prezime' => $prezime,
        'prosek' => $prosek
    );
} else {
    $rez_niz = array(
        'poruka' => 'ERR',
        'ime' => '',
        'prezime' => '',
        'prosek' => ''
    );
}
echo json_encode($rez_niz);
