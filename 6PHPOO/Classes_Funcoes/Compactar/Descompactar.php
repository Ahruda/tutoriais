<?php
$zip = new ZipArchive;
    $zip->open('nome.zip');
    $zip->extractTo('./');// Destino
    $zip->close();
    echo "Ok!";

