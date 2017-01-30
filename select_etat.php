<?php 
$req = $bdd->query('SELECT * FROM etat_ticket');

while ($data_etat = $req -> fetch() )
{	
	echo '<option value ="' . $data_etat['id_etat']. '" ' ;
	
	if (isset($prechargement['etat']) )
	{
		if ($data_etat['id_etat']== $prechargement['etat'])
		{
			echo 'selected';
		}
	}
	
	echo '>' . $data_etat['intitule_etat'] . '</option>';
}
?>