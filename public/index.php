<?php
try
{
	// On se connecte à MySQL
	$bdd = new PDO('mysql:host=localhost:3306;dbname=kickboosteryohan;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Projet');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Projet</strong> : <?php echo $donnees['titre']; ?>
    (<?php echo $donnees['description']; ?>) durée <?php echo $donnees['duree']; ?> jours !<br />
    Objectif financier : <?php echo $donnees['objectifFinancier']; ?> €.
	</p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>