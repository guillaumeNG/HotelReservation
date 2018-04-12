<?php ?>

<ul id="menu">
    <li><a href="../controls/MainControl.php">Accueil</a></li>
    
    <li><a href="../controls/MainControl.php?action=ClientsSelectAll" >Clients</a>
        <ul>
            <li><a href="../controls/MainControl.php?action=ClientsSelectAll" >Select ALL</a></li>
            <li><a href="../boundaries/clientsInsertIHM.php" >Insert</a></li>
            <li><a href="../controls/MainControl.php?action=ClientsDelete" >Delete</a></li>
            <li><a href="../controls/MainControl.php?action=ClientsUpdate" >Update</a></li>

        </ul> 
    </li>

    <li><a href="../controls/HotelControl.php?action=HotelSelectAll" >Hotel</a>
        <ul>
            <li><a href="../controls/HotelControl.php?action=HotelSelectAll" >Select ALL</a></li>
            <li><a href="../controls/HotelControl.php?action=HotelInsert" >Insert</a></li>
            <li><a href="../controls/HotelControl.php?action=HotelDelete" >Delete</a></li>
            <li><a href="../controls/HotelControl.php?action=HotelUpdate" >Update</a></li>
        </ul>
    </li>

     <li><a href="../controls/LogementControl.php?action=LogementSelectAll" >Logement</a>
        <ul>
            <li><a href="../controls/LogementControl.php?action=LogementSelectAll" >Select ALL</a></li>
            <li><a href="../controls/LogementControl.php?action=LogementInsert" >Insert</a></li>
            <li><a href="../controls/LogementControl.php?action=LogementDelete" >Delete</a></li>
            <li><a href="../controls/LogementControl.php?action=LogementUpdate" >Update</a></li>
        </ul>
    </li>


</ul>

