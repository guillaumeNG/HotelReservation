



INSERT INTO `clients` (`id`, `nom`, `email`, `mdp`, `photo`, `tel`) VALUES
(1, 'guillaume', 'client1@gmail.com', '1111', 'image1.jpg', 600112233),
(2, 'djibril', 'client2@gmail.com', '2222', 'image2.jpg', 644556677),
(3, 'iliana', 'client3@gmail.com', '3333', 'image3.jpg', 655667788),
(4, 'neylah', 'client4@gmail.com', '4444', 'image4.jpg', 666778899);
COMMIT;



INSERT INTO `hotel` (`id`, `nom`, `ville`, `cp`, `tel_hotel`) VALUES
(1, 'Hilton', 'paris', 75008, ' 01 40 08 44 44'),
(2, 'Urbanica', 'Miami', 33139, '+1 305-763-8934'),
(3, 'Alexander', 'New york', 10025, '+1 212-665-0003'),
(4, 'Majestic ', 'Finsbury park', 11328, '+44 20 8800 2022');
COMMIT;



INSERT INTO `logement` (`id`, `type`, `taille`, `disponibilité`) VALUES
(1, 'chambre familiale', '80 m2', '7jours'),
(2, 'suite luxe', '146 m2', '3 jours'),
(3, 'chambre simple / single room ', '25 m2', '14 jours'),
(4, 'chambre double ', '41 m2', '18 jours');
COMMIT;



INSERT INTO `pays` (`id`, `nom_pays`) VALUES
(1, 'france'),
(2, 'USA'),
(3, 'cameroun'),
(4, 'tunisie'),
(5, 'grande bretagne'),
(6, 'brasil');
COMMIT;



INSERT INTO `reservation` (`id`, `date _reservation`, `nbre_jours`, `prix`) VALUES
(1, '2018-03-08', 9, 447),
(2, '2018-03-07', 5, 239),
(3, '2018-03-04', 14, 818),
(4, '2018-03-01', 12, 760);
COMMIT;


