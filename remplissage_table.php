<?php 

include('connexiondb.php');

$i=1;

while ($i<=100)
{
	$bdd -> exec("INSERT INTO salle (salle_numero) VALUES(".$i.")");
	echo $i.' a été ajouté<br/>';
	$i++;
}

echo 'end';
?>