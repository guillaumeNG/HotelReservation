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
        <title>HotelInsertIHM.php</title>
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
            
            <form action='../controls/HotelControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idHotel' class='etiquette'>Id Hotel</label>
                        </td>
                        <td>
                            <input type='number' value='100' name='idHotel' id='idHotel' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomHotel' class='etiquette'>Nom Hotel</label>
                        </td>
                        <td>
                            <input type='text' value='le marriott hotel' name='nomHotel' id='nomHotel' />
                        </td>
                    </tr>
                     <tr>
                        <td>
                            <label for='ville' class='etiquette'>ville où se trouve l'hôtel</label>
                        </td>
                        <td>
                            <input type='text' value='Antony' name='ville' id='ville' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='cp' class='etiquette'>code postal de l'hôtel</label>
                        </td>
                        <td>
                            <input type='text' value='92160' name='cp' id='cp' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='telHotel' class='etiquette'>téléphone de l'hôtel</label>
                        </td>
                        <td>
                            <input type='number' value='0199334566' name='telHotel' id='cp' />
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="HotelInsertValidation" />
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
