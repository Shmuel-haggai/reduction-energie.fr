<?php

include "connexion.php";
include "Excel.php";

$excel = new Excel($bdd);

if (!empty($_POST['supprimer_ligne'])) {
	$id = htmlspecialchars($_POST['id'], ENT_QUOTES);

	$sqlD = "DELETE FROM fiche WHERE id = $id";
	$reqD = $bdd->query($sqlD);
}

if (!empty($_POST['export_all'])) {
	$sql = "SELECT * FROM fiche ORDER BY id ASC";
	$req = $bdd->query($sql);

	$entete = array('Id client', 'Type de bien', 'Est propriétaire', 'Prénom Nom', 'Téléphone', 'Email', 'Revenus', 'Code postal', 'Surface');

	$clients = array();

	$clients[] = $entete;

	while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
		$c = array();

		$c[] = str_replace("'", "\'", $d['id']);
		$c[] = str_replace("'", "\'", date('m/d/Y H:i:s', $d['time']));
		$c[] = str_replace("'", "\'", $d['type_bien']);
		$c[] = str_replace("'", "\'", $d['proprietaire']);
		$c[] = str_replace("'", "\'", $d['prenom'].' '.$d['nom']);
		$c[] = str_replace("'", "\'", $d['telephone']);
		$c[] = str_replace("'", "\'", $d['email']);
		$c[] = str_replace("'", "\'", $d['revenus']);
		$c[] = str_replace("'", "\'", $d['code_postal']);
		$c[] = str_replace("'", "\'", $d['surface']);

		$clients[] = $c;
	}

	$excel->exporterExcel($clients, 'clients.xlsx');
	header('Location: ./clients.xlsx');
}

if (!empty($_POST['export_new'])) {
	$sql = "SELECT * FROM fiche ORDER BY id ASC";
	$req = $bdd->query($sql);

	$entete = array('Id client', 'Type de bien', 'Est propriétaire', 'Prénom Nom', 'Téléphone', 'Email', 'Revenus', 'Code postal', 'Surface');

	$clients = array();

	$clients[] = $entete;

	while ($d = $req->fetch(PDO::FETCH_ASSOC)) {
		$c = array();

		$id = $d['id'];

		$c[] = str_replace("'", "\'", $d['id']);
		$c[] = str_replace("'", "\'", date('m/d/Y H:i:s', $d['time']));
		$c[] = str_replace("'", "\'", $d['type_bien']);
		$c[] = str_replace("'", "\'", $d['proprietaire']);
		$c[] = str_replace("'", "\'", $d['prenom'].' '.$d['nom']);
		$c[] = str_replace("'", "\'", $d['telephone']);
		$c[] = str_replace("'", "\'", $d['email']);
		$c[] = str_replace("'", "\'", $d['revenus']);
		$c[] = str_replace("'", "\'", $d['code_postal']);
		$c[] = str_replace("'", "\'", $d['surface']);

		$clients[] = $c;

		$sqlU = "UPDATE fiche SET exporter = 1 WHERE id = $id";
		$reqU = $bdd->query($sqlU);
	}

	$excel->exporterExcel($clients, 'clients.xlsx');
	header('Location: ./clients.xlsx');
}

$sql = "SELECT * FROM fiche ORDER BY id ASC";
$req = $bdd->query($sql);

?>

<table>
	<tr>
		<td>
			id
		</td>
		<td>
			Date
		</td>
		<td>
			Type de bien
		</td>
		<td>
			Est propriétaire
		</td>
		<td>
			Prénom Nom
		</td>
		<td>
			Téléphone
		</td>
		<td>
			Email
		</td>
		<td>
			Revenus
		</td>
		<td>
			Code postal
		</td>
		<td>
			Surface
		</td>
	</tr>
	<?php
	while ($d = $req->fetch(PDO::FETCH_ASSOC)) { ?>
		<tr>
			<td>
				<?php echo $d['id']; ?>
			</td>
			<td>
				<?php echo date('m/d/Y H:i:s', $d['time']); ?>
			</td>
			<td>
				<?php echo $d['type_bien']; ?>
			</td>
			<td>
				<?php echo $d['proprietaire']; ?>
			</td>
			<td>
				<?php echo $d['prenom'].' '.$d['nom']; ?>
			</td>
			<td>
				<?php echo $d['telephone']; ?>
			</td>
			<td>
				<?php echo $d['email']; ?>
			</td>
			<td>
				<?php echo $d['revenus']; ?>
			</td>
			<td>
				<?php echo $d['code_postal']; ?>
			</td>
			<td>
				<?php echo $d['surface']; ?>
			</td>
		</tr>
	<?php } ?>
</table>

<style type="text/css">
	tr, td {
		border: 1px solid black;
	}

	table {
		width: 100%;
	}

	td {
		text-align: center;
		width: 6%;
	}

	button {
		width: 100%;
		cursor: pointer;
	}
</style>