<?php 
session_start();
require('connexiondb.php');?>

<?php 
//confirmer suppression


$request = $bdd->prepare('DELETE FROM incident WHERE id_incident= :idTicket');
$request -> execute(array(
	'idTicket'=>$_SESSION['id_ticket_selectionne']
	));

header ("Location:index.php");
?>
