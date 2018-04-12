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
        <title>LogementInsertIHM.php</title>
    </head>

    <body>
        <header id="header">
            <?php
            include 'partials/Header.php';
            ?>
        </header><br><br>

        <nav id="nav">
            <?php
            include 'partials/Nav.php';
            ?>
        </nav>
        
    <fiedset>
        <article id="article"><br><br>
            <p id="imgs">
            <h1>Enregistrer un hotel</h1>
            <img src="../images/contact.jpg"  alt="Image ajout hotel" />               
            </p>
            
            <form action='../controls/LogementControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idLogement' class='etiquette'>Id Logement</label>
                        </td>
                        <td>
                            <input type='text' value='100' name='idLogement' id='idLogement' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='typeLogement' class='etiquette'>Type Logement</label>
                        </td>
                        <td>
                            <input type='text' value='chambre double' name='typeLogement' id='typeLogement' />
                        </td>
                    </tr>
                    
                     <tr>
                        <td>
                            <label for='taille' class='etiquette'>Taille </label>
                        </td>
                        <td>
                            <input type='text' value='28 m2' name='taille' id='tailleLogement' />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <label for='disponibilite' class='etiquette'>disponibilité </label>
                        </td>
                        <td>
                            <input type='text' value='8jours' name='disponibilite' id='disponibilite' />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="LogementInsertValidation" />
                        </td>
                        <td>
                            <button type='submit'>Ajouter</button>
                        </td>
                    </tr>
                </table>
            </form>
        </article>
    </fiedset>
    
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
