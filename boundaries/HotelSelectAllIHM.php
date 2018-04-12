

<!DOCTYPE html>
<!--
HotelSelectAllIHM.php
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="../css/main.css">
        <link rel="stylesheet" type="text/css" href="../css/ClientsInsertIHM.css">
        <link rel="stylesheet" type="text/css" href="../css/HotelInsertIHM.css">
         <link rel="stylesheet" type="text/css" href="../css/AccueilIHM.css">
        <title>HotelSelectAllIHM</title>
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
             <img src="../images/selectall.jpg"  alt="Image création projet" />
            <h1>Hotel</h1>
            <table>
                <thead>
                    <tr>
                        <th class='borde'>ID</th>
                        <th class='borde'>Nom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    echo $lsContenu;
                    ?>
                </tbody>
            </table>
        </article>
        <footer id="footer">
            <?php
            include 'partials/Footer.php';
            ?>
        </footer>
    </body>
</html>

