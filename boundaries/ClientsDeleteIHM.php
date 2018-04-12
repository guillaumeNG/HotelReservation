


<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/ClientsDeleteIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
        
    
        <title>ClientsDeleteIHM.php</title>
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
            <h1>Supprimer un Clients</h1>
            <img src="../images/suppr.jpg"  alt="Image ajout Client" />
            <form action="../controls/MainControl.php" method="POST">
                <select name="listeClients">
                    <?php
                    //... boucle sur le tableau stLines et retour $tLines[i]
                    //...qui correspond à une ligne du tableau stockée dans
                    //...une variable $line.
                    for ($i = 0; $i < count($tLines); $i++) {

                        $line = $tLines[$i];
                        ?>
                        <option value="<?php echo $line->getIdClients(); ?>"><?php echo $line->getNomClients(); ?></option>

                        <?php
                    }
                    ?>
                </select> 

                <input type="hidden" name="action" value="ClientsDeleteSelection" />
                <button type='submit'>Sélectionner</button>

            </form>
            
            <form action='../controls/MainControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idClients' class='etiquette'>Id Clients</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $idClients; ?>' name='idClients' id='idClients' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomClients' class='etiquette'>Nom Clients</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $nomClients; ?>' name='nomClients' id='nomClients' />
                        </td>
                    </tr>
                
                        <td>
                            <input type="hidden" name="action" value="ClientsUpdateValidation" />
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
