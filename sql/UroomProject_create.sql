

DROP TABLE IF EXISTS  clients;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(12) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `tel` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS hotel;
CREATE TABLE `hotel` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `tel_hotel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS  logement;
CREATE TABLE `logement` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `taille` varchar(50) NOT NULL,
  `disponibilité` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS pays;
CREATE TABLE `pays` (
  `id` int(11) NOT NULL,
  `nom_pays` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS reservation;
CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `date _reservation` date NOT NULL,
  `nbre_jours` int(50) NOT NULL,
  `prix` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id`);



ALTER TABLE `logement`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `pays`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);




ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



ALTER TABLE `logement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `pays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;



ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;



