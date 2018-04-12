<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
//require_once '../entities/HotelDAO.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/HotelUpdateIHM.css">
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
            <h1>Modifier le Profile d'un  Hotel</h1>
            <img src="../images/ud-2013.jpg"  alt="Image création Hotel" />
            <form action='../controls/HotelControl.php' method='POST'>
                <select name="listeHotel">
                    <?php
                    
                    for ($i = 0; $i < count($tLines); $i++) {
                        $line = $tLines[$i];
                        ?>

                        <option value="<?php echo $line->getIHotel(); ?>"><?php echo $line->getNomHotel(); ?></option>

                        <?php
                    }
                    ?>
                </select>
                <input type="hidden" name="action" value="HotelUpdateSelection" />
                <button type='submit'>Sélectionner</button>
            </form>


            <form action='../controls/HotelControl.php' method='POST'>
                <table class='formulaireTable'>
                    <tr>
                        <td>
                            <label for='idDeveloppeur' class='etiquette'>Id Developpeur</label>
                        </td>
                        <td>
                            <input type='hidden' value='<?php echo $id; ?>' name='idHotel
                    </tr>
                    <tr>
                        <td>
                            <label for='nomHotel' class='etiquette'>Nom Hotel</label>
                        </td>
                        <td>
                            <input type='text' value='<?php echo $lsNon; ?>' name='nomHotel' id='nomHotel' />
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <input type="hidden" name="action" value="HotelUpdateValidation" />
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


