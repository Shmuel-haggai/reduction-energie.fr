<?php

include "excel/xlsxRead/src/SimpleXLSX.php";
include "excel/xlsxWrite/src/SimpleXLSXGen.php";

include 'connexion.php';

class Excel {
	private $_bdd;
	
	function __construct($bdd) {
		$this->setBdd($bdd);
	}

	function importerExcel($file) {
		$xlsx = SimpleXLSX::parse($file);
		$lignes = $xlsx->rows();

		for ($i = 1; $i < count($lignes); $i++) {

			$date            = $lignes[$i][0];
			$evenement       = $lignes[$i][1];
			$nom_epreuve     = $lignes[$i][2];
			$numero_epreuve  = $lignes[$i][3];
			$numero_dossard  = $lignes[$i][4];
			$nom_personne    = $lignes[$i][5];
			$prenom_personne = $lignes[$i][6];
			$nom_cheval      = $lignes[$i][7];

			$nom_cheval = str_replace("*", " ", $nom_cheval);
			$nom_cheval = str_replace("'", ".", $nom_cheval);
			$nom_personne = str_replace("*", " ", $nom_personne);
			$nom_personne = str_replace("'", ".", $nom_personne);
			$prenom_personne = str_replace("*", " ", $prenom_personne);
			$prenom_personne = str_replace("'", ".", $prenom_personne);

			$nom_personne = trim($nom_personne);
			$prenom_personne = trim($prenom_personne);
			$nom_cheval = trim($nom_cheval);

			if ($nom_cheval[0] == ".") {
				$nom_cheval = substr($nom_cheval, 1);
			}

			if ($nom_personne[0] == ".") {
				$nom_personne = substr($nom_personne, 1);
			}

			if ($prenom_personne[0] == ".") {
				$prenom_personne = substr($prenom_personne, 1);
			}

			if ($nom_cheval[strlen($nom_cheval)-1] == ".") {
				$nom_cheval = substr($nom_cheval, 0, -1);
			}

			if ($nom_personne[strlen($nom_personne)-1] == ".") {
				$nom_personne = substr($nom_personne, 0, -1);
			}

			if ($prenom_personne[strlen($prenom_personne)-1] == ".") {
				$prenom_personne = substr($prenom_personne, 0, -1);
			}

			$taille_num_dossard = strlen($numero_dossard);

			if ($taille_num_dossard < 4) {
				for ($d = 0; $d < 4 - $taille_num_dossard; $d++) {
					$numero_dossard = "0".$numero_dossard;
				}
			}

			if (!is_dir("../depot/".$date.$evenement)) {
				mkdir("../depot/".$date.$evenement);
			}

			if (!is_dir("../depot/".$date.$evenement."/".$numero_epreuve."_".$nom_epreuve)) {
				mkdir("../depot/".$date.$evenement."/".$numero_epreuve."_".$nom_epreuve);
			}

			if (!is_dir("../depot/".$date.$evenement."/".$numero_epreuve."_".$nom_epreuve."/".$numero_dossard."_".$nom_personne." ".$prenom_personne."_".$nom_cheval)) {
				mkdir("../depot/".$date.$evenement."/".$numero_epreuve."_".$nom_epreuve."/".$numero_dossard."_".$nom_personne." ".$prenom_personne."_".$nom_cheval);
			}
		}
	}

	function lireExcel($file) {
		$xlsx = SimpleXLSX::parse($file);

		$lignes = $xlsx->rows();

		for ($i = 1; $i < count($lignes); $i++) {

			$date            = $lignes[$i][0];
			$evenement       = $lignes[$i][1];
			$nom_epreuve     = $lignes[$i][2];
			$numero_epreuve  = $lignes[$i][3];
			$numero_dossard  = $lignes[$i][4];
			$nom_personne    = $lignes[$i][5];
			$prenom_personne = $lignes[$i][6];
			$nom_cheval      = $lignes[$i][7];

			$nom_cheval = str_replace("*", " ", $nom_cheval);
			$nom_cheval = str_replace("'", ".", $nom_cheval);
			$nom_personne = str_replace("*", " ", $nom_personne);
			$nom_personne = str_replace("'", ".", $nom_personne);
			$prenom_personne = str_replace("*", " ", $prenom_personne);
			$prenom_personne = str_replace("'", ".", $prenom_personne);

			$nom_personne = trim($nom_personne);
			$prenom_personne = trim($prenom_personne);
			$nom_cheval = trim($nom_cheval);

			if ($nom_cheval[0] == ".") {
				$nom_cheval = substr($nom_cheval, 1);
			}

			if ($nom_personne[0] == ".") {
				$nom_personne = substr($nom_personne, 1);
			}

			if ($prenom_personne[0] == ".") {
				$prenom_personne = substr($prenom_personne, 1);
			}

			if ($nom_cheval[strlen($nom_cheval)-1] == ".") {
				$nom_cheval = substr($nom_cheval, 0, -1);
			}

			if ($nom_personne[strlen($nom_personne)-1] == ".") {
				$nom_personne = substr($nom_personne, 0, -1);
			}

			if ($prenom_personne[strlen($prenom_personne)-1] == ".") {
				$prenom_personne = substr($prenom_personne, 0, -1);
			}

			$taille_num_dossard = strlen($numero_dossard);

			if ($taille_num_dossard < 4) {
				for ($d = 0; $d < 4 - $taille_num_dossard; $d++) {
					$numero_dossard = "0".$numero_dossard;
				}
			}
		}
	}

	function exporterExcel($donnees, $file) {
		$xlsx = SimpleXLSXGen::fromArray($donnees);
		$xlsx->saveAs($file);
	}

	public function setBdd($bdd) {
		$this->_bdd = $bdd;
	}
}

?>
