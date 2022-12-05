<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');

function genererChaineAleatoire($longueur = 10) {
  $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $longueurMax = strlen($caracteres);
  $chaineAleatoire = '';
  for ($i = 0; $i < $longueur; $i++) {
    $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
  }
  return $chaineAleatoire;
}

$server='sc4shha6455_sms';
$username='sc4shha6455_sms';
$password='Kiki2001@';
$database = 'sc4shha6455_sms';
$charset='utf8';

try {
	$bdd = new PDO('mysql:host='.$server.';dbname='.$database.';charset='.$charset, $username, $password);
} catch (PDOException $e) {
	echo "Error de connexion : ".$e->getMessage()."<br />";
}

$etape            = htmlspecialchars($_POST['etape'], ENT_QUOTES);

if ($etape == 1) {
  $time         = time();
  $aleatoire    = genererChaineAleatoire(20);
  $type_bien    = htmlspecialchars($_POST['type_bien'], ENT_QUOTES);
  $proprietaire = htmlspecialchars($_POST['proprietaire'], ENT_QUOTES);
  $energie      = htmlspecialchars($_POST['energie'], ENT_QUOTES);

  if ($type_bien == '1') {
    $type_bien = 'Maison';
  } else if ($type_bien == '2') {
    $type_bien = 'Appartement';
  }

  if ($proprietaire == '1') {
    $proprietaire = 'Oui';
  } else if ($proprietaire == '2') {
    $proprietaire = 'Non';
  }

  if ($energie == '1') {
    $energie = 'Gaz';
  } else if ($energie == '2') {
    $energie = 'Fioul';
  } else if ($energie == '3') {
    $energie = 'Autre';
  }

  $nom          = htmlspecialchars($_POST['nom'], ENT_QUOTES);
  $telephone    = htmlspecialchars($_POST['telephone'], ENT_QUOTES);
  $email        = htmlspecialchars($_POST['email'], ENT_QUOTES);

  $sql = "INSERT INTO `fiche` (`time`, `aleatoire`, `type_bien`, `proprietaire`, `chauffage`)
        VALUES ('".$time."', '".$aleatoire."', '".$type_bien."', '".$proprietaire."', '".$energie."');";
  $req = $bdd->query($sql);

  $sql = "SELECT * FROM fiche WHERE aleatoire = '".$aleatoire."' ORDER BY id DESC";
  $req = $bdd->query($sql);
  
  $id = -1;
  $d = $req->fetch(PDO::FETCH_ASSOC);
  $id = $d['id'];

  $sql = "UPDATE `fiche` SET nom = '".$nom."', telephone = '".$telephone."', email = '".$email."' WHERE id = $id;";
  $req = $bdd->query($sql);

  echo $id;
} else if ($etape == 2) {
  $id           = htmlspecialchars($_POST['id'], ENT_QUOTES);
  $nom          = htmlspecialchars($_POST['nom'], ENT_QUOTES);
  $prenom       = htmlspecialchars($_POST['prenom'], ENT_QUOTES);
  $email        = htmlspecialchars($_POST['email'], ENT_QUOTES);
  $telephone    = htmlspecialchars($_POST['telephone'], ENT_QUOTES);

  $sql = "UPDATE `fiche` SET nom = '".$nom."', prenom = '".$prenom."', telephone = '".$telephone."', email = '".$email."' WHERE id = $id;";
  $req = $bdd->query($sql);

} else {
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES);

  $revenus           = htmlspecialchars($_POST['revenus'], ENT_QUOTES);
  $code_postal       = htmlspecialchars($_POST['code_postal'], ENT_QUOTES);
  $departement       = substr($code_postal, 0, 2);
  $idf               = false;
  if ($departement == "75" || $departement == "91" || $departement == "92" || $departement == "93" || $departement == "94" || $departement == "95" || $departement == "77" || $departement == "78") {
    $idf = true;
  }
  $surface           = htmlspecialchars($_POST['surface'], ENT_QUOTES);

  if ($date_construction == '1') {
    $date_construction = 'Plus de 10 ans';
  } else if ($date_construction == '2') {
    $date_construction = 'Moins de 10 ans';
  }


  if ($revenus == '1') {
    $revenus = 'Moins de 15 000';
  } else if ($revenus == '2') {
    $revenus = 'De 15 000 à 35 000';
  } else if ($revenus == '3') {
    $revenus = 'Plus de 35 000';
  }

  if ($surface == '1') {
    $surface = 'De 0 à 150';
  } else if ($surface == '2') {
    $surface = 'De 150 à 250';
  } else if ($surface == '3') {
    $surface = 'Plus de 250';
  }

  $sql = "UPDATE `fiche` SET revenus = '".$revenus."', code_postal = '".$code_postal."', surface = '".$surface."' WHERE id = $id;";
  $req = $bdd->query($sql);
}

?>