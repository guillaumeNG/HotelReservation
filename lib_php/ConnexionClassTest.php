<?php

/*
 * ConnexionClassTest.php
 */
require_once '../php_lib/Connexion.class.php';

$lcnx = Connexion::seConnecter("../conf/connexion.properties");

echo "<br><pre>";
var_dump($lcnx);
echo "</pre><br>";

if ($lcnx == null) {
    echo "La connexion est nulle !!!";
} else {
    Connexion::seDeconnecter($lcnx);
}
?>
