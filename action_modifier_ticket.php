<?php
session_start();
include ('connexiondb.php');

//echo 'post :';
//print_r ($_POST);
//echo '<br/><br/>session :';
print_r ($_SESSION);

/**/
//
$req = $bdd -> prepare('UPDATE incident 
						SET etat = :ModifEtat, materiel_id = :ModifMatos, objet_incident = :ModifObjet,
						description_incident = :ModifDescription,solution_incident = :ModifSolution,
						date_signalement = :ModifDateSignalement, date_intervention = :ModifDateIntervention, 
						salle_id = :ModifSalle,demandeur_id = :ModifDemandId, niveau_urgence = :ModifUrgence, 
						niveau_complexite = :ModifComplexite, duree = :ModifDuree, nb_appels = :ModifNbAppels,
						technicien_id= :ModifTechId
						WHERE id_incident = :id ');
						
$req->execute(array(
	'ModifEtat'=>$_POST['ModifEtat'],
	'ModifMatos'=>$_POST['ModifMatos'],
	'ModifObjet'=>$_POST['ModifObjet'],
	'ModifDescription'=>$_POST['ModifDescription'],
	'ModifSolution' => $_POST['ModifSolution'],
	'ModifDateSignalement'=>$_POST['ModifDateSignalement'],
	'ModifDateIntervention'=>$_POST['ModifDateIntervention'],
	'ModifSalle'=>$_POST['ModifSalle'],
	'ModifDemandId'=>$_POST['ModifDemandId'],
	'ModifUrgence'=>$_POST['ModifUrgence'],
	'ModifComplexite'=>$_POST['ModifComplexite'],
	'ModifDuree'=>$_POST['ModifDuree'],
	'ModifNbAppels'=>$_POST['ModifNbAppels'],
	'ModifTechId'=>$_POST['ModifTechId'],
	'id'=>$_SESSION['id_ticket_selectionne']
	));

header ("Location:index.php");
?>
