

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
        <link rel="stylesheet" type="text/css" href="../css/HotelInsertIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/HotelDeleteIHM.css">

        <title>HotelDeleteIHM.php</title>
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
            <h1>Supprimer un Hotel</h1>
            <img src="../images/suppr.jpg"  alt="Image création Developpeur" />
            <form action="../controls/MainControl.php" method="POST">
                <select name="listeDeveloppeurs">
                    <?php
                    //... boucle sur le tableau stLines et retour $tLines[i]
                    //...qui correspond à une ligne du tableau stockée dans
                    //...une variable $line.
                    for ($i = 0; $i < count($tLines); $i++) {

                        $line = $tLines[$i];
                        ?>
                        <option value="<?php echo $line->getIdHotel(); ?>"><?php echo $line->getNomHotel(); ?></option>

                        <?php
                    }
                    ?>
                </select> 

                <input type="hidden" name="action" value="HotelDeleteSelection" />
                <button type='submit'>Sélectionner</button>

            </form>
            
            <form action='../controls/MainControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idHotel' class='etiquette'>Id Hotel</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $idHotel; ?>' name='idHotel' id='idHotel' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomHotel' class='etiquette'>Nom Hotel</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $nomHotel; ?>' name='nomHotel' id='nomHotel' />
                        </td>
                    </tr>
                
                        <td>
                            <input type="hidden" name="action" value="DeveloppeurUpdateValidation" />
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
