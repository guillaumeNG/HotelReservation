<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once '../entities/Clients.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/ClientsUpdateIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
        <title>ClientsUpdateIHM.php</title>
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
            <h1>Modifier le Profile d'un  Client</h1>
            <img src="../images/update-512.png"  alt="Image mise à jour" />
            <form action='../controls/ClientsControl.php' method='POST'>
                <select name="listeClients">
                    <?php
                    
                    for ($i = 0; $i < count($tLines); $i++) {
                        $line = $tLines[$i];
                        ?>

                        <option value="<?php echo $line->getIClients(); ?>"><?php echo $line->getNomClients(); ?></option>

                        <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="action" value="ClientsUpdateSelection" />
                <button type='submit'>Sélectionner</button>
            </form>


            <form action='../controls/ClientsControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idClients' class='etiquette'>Id Clients</label>
                        </td>
                        <td>
                            <input type='hidden' value='<?php echo $id; ?>' name='idClients' id='idClients' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomClients' class='etiquette'>Nom Developpeur</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $lsNon; ?>' name='nomClients' id='nomClients' />
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <input type="hidden" name="action" value="ClientsUpdateValidation" />
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


