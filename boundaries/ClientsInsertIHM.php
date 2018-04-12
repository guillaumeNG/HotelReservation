<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Uroom booking form</title>

        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/ClientsUpdateIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/ClientsInsertIHM.css">

        <title>ClientsInsertIHM.php</title>

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

        <article id="article"><br><br>
            <h1>un choix pour tous</h1>
            <img src="../images/sun.png"  alt="Image hotel" />
            <img src="../images/c1.jpg"  alt="Image hotel" />

            <form action='../controls/ClientsControl.php' method='POST' id="form1">
                <table class="formulaireTable">

                    <h3>Pas encore inscrit : </h3>

                    <tr>
                        <td>
                            <label for='idClients' class='etiquette'>Id Client</label>
                        </td><br>
                    <td>
                        <input type='text' value='100' name='idClients' id='idClients' required/>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <label for='nomClients' class='etiquette'>Nom Client</label>
                        </td>
                        <td>
                            <input type='text' value='Guil..' name='nomClients' id='nomClients' required/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for='email' class='email'>Email </label>
                        </td>
                        <td>
                            <input type='email' value='Guil@test.fr' name='email' id='email' placeholder="votre email" required/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for='mdp' class='mdp'>mot de passe </label>
                        </td>
                        <td>
                            <input type='text' name='mdp' placeholder="entrez votre mdp"id='mdp' required/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for='tel' class='mdp'>Telephone </label>
                        </td>
                        <td>
                            <input type='number' name='tel' placeholder="votre num de tel"id='tel' required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="ClientsInsertValidation" />
                        </td>
                        <td>
                            <button type='submit'>M'inscrire</button>
                        </td>
                    </tr>

                </table>
            </form>

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
