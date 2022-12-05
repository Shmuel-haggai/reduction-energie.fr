CREATE TABLE `fiche` (
  `id` int(11) NOT NULL,
  `time` varchar(500) DEFAULT NULL,
  `aleatoire` varchar(500) DEFAULT NULL,
  `type_bien` varchar(500) DEFAULT NULL,
  `proprietaire` varchar(500) DEFAULT NULL,
  `chauffage` varchar(500) DEFAULT NULL,
  `nom` varchar(500) DEFAULT NULL,
  `prenom` varchar(500) DEFAULT NULL,
  `telephone` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `revenus` varchar(500) DEFAULT NULL,
  `code_postal` varchar(500) DEFAULT NULL,
  `surface` varchar(500) DEFAULT NULL,
  `exporter` int(11) NOT NULL DEFAULT 0,
  `api` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `fiche`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `fiche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;