<?php 

$req = $bdd->query('
	SELECT i.`id_incident`, i.`etat`, i.`materiel_id`, i.`objet_incident`, i.`date_signalement`, 
	i.`date_intervention`,i.`salle_id`,i.`technicien_id`, i.`demandeur_id`, i.niveau_urgence, 
	i.`niveau_complexite`, i.`duree`, i.`nb_appels`,
	
	e.`id_etat`, e.`intitule_etat` AS `etat`,
	m.`id_materiel`, m.`type` AS `type_materiel`, m.`marque`AS `marque_materiel`,
	s.`salle_id`, s.`salle_nom`,s.`salle_numero`,
	t.`id_technicien`, t.`nom` AS technicien, t.`prenom`,
	u.`id`, u.`nom` AS demandeur
	
	FROM `incident` i
	JOIN `etat_ticket` e
	ON i.`etat` = e.`id_etat` 
	JOIN `materiel` m
	ON i.`materiel_id` = m.`id_materiel`
	JOIN `salle` s
	ON i.`salle_id` = s.`salle_id`
	JOIN `technicien` t
	ON i.`technicien_id` = t.`id_technicien`
	JOIN `utilisateur` u
	ON i.`demandeur_id` = u.`id`
	ORDER BY  `id_incident` ASC
');