<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Uroom booking form</title>
      
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
        
        <title>ClientsInsertIHM.php</title>
    
</head>

<body>
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
            <h3>Bienvenue sur Uroom ...retrouvez vos hotels préférés, des activités de rêve que vous aurez du mal à faire un choix ! </h3>
            <div id="div1">
            <img src="../images/g5.jpg" alt="Image Accueil"  />
            <img src="../images/g1.jpg" alt="Image Accueil" />
            <img src="../images/g3.jpg" alt="Image Accueil" />
            <img src="../images/a1.jpg" alt="Image Accueil" />
            <img src="../images/g7.jpg" alt="Image Accueil" />
            <img src="../images/a1.jpg" alt="Image Accueil" />
            </div>
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
