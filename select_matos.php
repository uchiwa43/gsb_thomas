<?php 
$req = $bdd->query('SELECT * FROM materiel ORDER BY type');

while ($data_matos = $req -> fetch() )
{	
	echo '<option value =' . $data_matos['id_materiel'] . ' ' ;
	if (isset ($prechargement['materiel_id']))
	{
		if ($prechargement['materiel_id']==$data_matos['id_materiel'])
		{
			echo 'selected';
		}
	}
	echo '>' . 
	$data_matos['type'] . ' - '.
	$data_matos['marque'] . ' - '.
	$data_matos['modele'] . '</option>';
}

?>