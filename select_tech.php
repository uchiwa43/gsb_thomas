<?php 
$req = $bdd->query('SELECT * FROM technicien');

while ($data_tech = $req -> fetch() )
{	
	echo '<option value ="' . $data_tech['id_technicien']. '" ' ;
	
	if (isset($prechargement['technicien_id']) )
	{
		if ($data_tech['id_technicien']== $prechargement['technicien_id'])
		{
			echo 'selected';
		}
	}
	
	echo '>' . $data_tech['nom'] . '</option>';
}
?>