

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/LogementInsertIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/LogementDeleteIHM.css">
        
     
   
        <title>LogementDeleteIHM.php</title>
    </head>

    <body>
        <header id="header">
            <?php
            include 'partials/Header.php';
            ?>
        </header>

        <nav id="nav">
            <?php
            include 'partials/Nav.php';
            ?>
        </nav>

        <article id="article">
            <h1>Supprimer un Logement</h1>
            <img src="../images/suppr.jpg"  alt="Image ajout Client" />
            <form action="../controls/MainControl.php" method="POST">
                <select name="listeLogement">
                    <?php
                    //... boucle sur le tableau stLines et retour $tLines[i]
                    //...qui correspond à une ligne du tableau stockée dans
                    //...une variable $line.
                    for ($i = 0; $i < count($tLines); $i++) {

                        $line = $tLines[$i];
                        ?>
                        <option value="<?php echo $line->getIdLogement(); ?>"><?php echo $line->getTypeLogement(); ?></option>

                        <?php
                    }
                    ?>
                </select> 

                <input type="hidden" name="action" value="LogementDeleteSelection" />
                <button type='submit'>Sélectionner</button>

            </form>
            
            <form action='../controls/MainControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idLogement' class='etiquette'>Id Logement</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $idLogement; ?>' name='idLogement' id='idLogement' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomLogement' class='etiquette'>Nom Logement</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $nomLogement; ?>' name='nomLogement' id='nomLogement' />
                        </td>
                    </tr>
                
                        <td>
                            <input type="hidden" name="action" value="LogementUpdateValidation" />
                        </td>
                        <td>
                            <button type='submit'>Supprimer</button>
                        </td>
                    </tr>
                </table>
            </form>
            <p>
                <label id='lblMessage'>
                    <?php
                    echo $lsMessage;
                    ?>
                </label>
            </p>

        </article>

        <footer id="footer">
            <?php
            include 'partials/Footer.php';
            ?>
        </footer>
    </body>
</html>
