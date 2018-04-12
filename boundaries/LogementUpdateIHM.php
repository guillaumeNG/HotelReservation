<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//require_once '../entities/LogementDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/LogementUpdateIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
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
            <h1>Modifier le Profile d'un Logement</h1>
            <img src="../images/ud-2013.jpg"  alt="Image ajout Logement" />
            <form action='../controls/LogementControl.php' method='POST'>
                <select name="listeLogement">
                    <?php
                    
                    for ($i = 0; $i < count($tLines); $i++) {
                        $line = $tLines[$i];
                        ?>

                        <option value="<?php echo $line->getILogement(); ?>"><?php echo $line->getTypeLogement(); ?></option>

                        <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="action" value="LogementUpdateSelection" />
                <button type='submit'>Sélectionner</button>
            </form>


            <form action='../controls/LogementControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idLogement' class='etiquette'>Id Logement</label>
                        </td>
                        <td>
                            <input type='hidden' value='<?php echo $id; ?>' name='idLogement' />
                    </tr>
                    <tr>
                        <td>
                            <label for='typeLogement' class='etiquette'>Type Logement</label>
                        </td>
                        <td>
                            <input type='varchar' value='<?php echo $lsNon; ?>' name='typeLogement' id='typeLogement' />
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <input type="hidden" name="action" value="LogementUpdateValidation" />
                        </td>
                        <td>
                            <button type='submit'>Modifier</button>
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


