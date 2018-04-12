<?php

/*
 * ConnexionTest.php
 */
require_once '../php_lib/Connexion.php';

$lcnx = seConnecter("../conf/connexion.properties");

echo "<br><pre>";
var_dump($lcnx);
echo "</pre><br>";

if ($lcnx == null) {
    echo "La connexion est nulle !!!";
} else {
    seDeconnecter($lcnx);
}
?>
