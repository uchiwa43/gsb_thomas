<?php require_once('connexiondb.php'); 
//l'affichage va toujours etre affiché dans l'index en include?>



<table class='incident'>
	<thead>
		<td> </td>
		<td>Numéro</td>
		<td>Etat</td>
		<td>Type du<br/>materiel</td>
		<td>Marque du<br/>materiel</td>
		<td>Objet de <br/>l'incident</td>
		<td>Date de <br/>signalement</td>
		<td>Date d'<br/>intervention</td>
		<td>Salle</td>
		<?php //champs supplémentaires pour responsables + techniciens
		if ($_SESSION['role'] == 3 OR $_SESSION['role'] == 2)
		{
			echo '
			<td>Technicien</td>
			<td>Demandeur</td>
			<td>Niveau<br/>d\'urgence</td>
			<td>Niveau de<br/>complexite</td>
			<td>Durée</td>
			<td>Nombre <br/>d\'appels</td>';
		}
		?>
	</thead>
		
	<?php include ('req_aff_liste.php');
	
	while ($ligne_ticket = $req -> fetch(PDO::FETCH_ASSOC) )
	{
	?>
		<tr id='ticket <?php echo $ligne_ticket['id_incident']?>'>
			
			<td> <a href='affichage_ticket.php?idTicket=<?php echo $ligne_ticket['id_incident'];?>' >Voir plus</a></td>
			<td> <?php echo $ligne_ticket['id_incident'];?> </td>
			<td> <?php echo $ligne_ticket['etat'];?> </td>
			<td> <?php echo $ligne_ticket['type_materiel'];?> </td>
			<td> <?php echo $ligne_ticket['marque_materiel'];?> </td>
			<td> <?php echo $ligne_ticket['objet_incident'];?> </td>
			<td> <?php echo $ligne_ticket['date_signalement'];?> </td>
			<td> <?php echo $ligne_ticket['date_intervention'];?> </td>
			<td> <?php
				echo $ligne_ticket['salle_numero'] ;
				if (!empty($ligne_ticket['salle_nom']))
				{
					echo ' ('.$ligne_ticket['salle_nom'].')';
				}
				?>
			</td>
			
			<?php 
			//champs supplémentaires pour les techniciens
			if ($_SESSION['role'] == 3 OR $_SESSION['role'] == 2)
			{
				echo '
				<td>'. $ligne_ticket['technicien'].'</td>
				<td>'. $ligne_ticket['demandeur'].' </td>
				<td>'. $ligne_ticket['niveau_urgence']. '</td>
				<td>'. $ligne_ticket['niveau_complexite'].'</td>
				<td>'. $ligne_ticket['duree'] .'</td>
				<td>'. $ligne_ticket['nb_appels'].' </td>'
				;
			}
			
		echo '<tr>';
	}
	?>
</table>
	