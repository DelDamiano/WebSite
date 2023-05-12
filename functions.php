<?php

function splitString($str, $separator) {
  // Découpe la chaîne de caractères en utilisant le séparateur
  $arr = explode($separator, $str);
  
  // Supprime les espaces avant et après chaque chaîne
  foreach($arr as &$val) {
    $val = trim($val);
  }
  
  // Retourne le tableau de chaînes de caractères
  return $arr;
}



function removeString($str, $toRemove) {
  // Supprime la chaîne de caractères en paramètre et les espaces avant et après
  $result = trim(str_replace($toRemove, "", $str));
  
  // Retourne la chaîne de caractères résultante
  return $result;
}



function mapStringArray(array $stringArray) {
    $mapping = array();

    // Itération sur chaque élément du tableau
    foreach ($stringArray as $string) {
        // Vérification de la présence du caractère ":" dans la chaîne
        if(strpos($string, ':') === false) {
            continue; // passe à la prochaine chaîne
        }
        
        // Séparation de la clé et de la valeur
        list($key, $valuesString) = array_map('trim', explode(':', $string));

        // Séparation des valeurs et suppression des espaces inutiles
        $values = array_map('trim', explode(',', $valuesString));

        // Ajout des valeurs dans le mapping correspondant à la clé
        if (!array_key_exists($key, $mapping)) {
            $mapping[$key] = array();
        }
        $mapping[$key] = array_merge($mapping[$key], $values);
    }

    // Tri du mapping par nombre de valeurs par clé (descendant)
    uasort($mapping, function ($a, $b) {
        return count($b) > count($a) ? 1 : (count($b) < count($a) ? -1 : 0);
    });

    return $mapping;
}



function assignFactions($playerToFactionsMap, $factionsList) {
  $actions = array();
  
  // Copie des factions non jouées pour chaque joueur
  $unplayedFactions = array();
  foreach ($playerToFactionsMap as $player => $playedFactions) {
    $unplayedFactions[$player] = array_diff($factionsList, $playedFactions);
  }

  // Attribution aléatoire de factions à chaque joueur
  foreach ($playerToFactionsMap as $player => $playedFactions) {
    // Sélectionner une faction aléatoire qui n'a pas été jouée par ce joueur
    $unplayed = $unplayedFactions[$player];
    if (count($unplayed) > 0) {
      $factionIndex = array_rand($unplayed);
      $faction = $unplayed[$factionIndex];
    }
    else {
      // Si le joueur a déjà joué toutes les factions, sélectionner une faction aléatoire dans la liste complète
      $factionIndex = array_rand($factionsList);
      $faction = $factionsList[$factionIndex];
    }
    
    // Enlever la faction sélectionnée de la liste des factions restantes pour les autres joueurs
    foreach ($unplayedFactions as $otherPlayer => $otherUnplayedFactions) {
      if ($otherPlayer !== $player) {
        $unplayedFactions[$otherPlayer] = array_diff($otherUnplayedFactions, array($faction));
      }
    }

    // Ajouter l'action associant le joueur à la faction sélectionnée
    $actions[$player] = $faction;
  }

  return $actions;
}

function tableHeader() {
	$tableHeader = '
									<h2>Draw</h2>
									<h3></h3>
									<div class="table-wrapper">
										<table>
											<thead>
												<tr>
													<th>Player</th>
													<th>Faction</th>
												</tr>
											</thead>
											<tbody>';
	echo $tableHeader;
}

function tableFooter() {
	$tableFooter = '</tbody>
											<tfoot>
												<tr>
													<td colspan="2"></td>
												</tr>
											</tfoot>
										</table>
									</div>';
	echo $tableFooter;
}









/**$textFactions = "Rome, Grèce, Byzance, Égypte, Carthage";
$textPlayers = "Anthony : Égypte
Audrey : Grèce, Carthage
Damien : Rome, Grèce
Guillaume : Grèce, Byzance, Égypte, Carthage
Hugo : Rome, Grèce, Égypte";




$factionsArr = splitString($textFactions, "," );

$playersLine = splitString($textPlayers, "\n" );

$playersMap= mapStringArray($playersLine) ;

$result = assignFactions($playersMap, $factionsArr);
print_r($result)**/
//displayMapping ($result);



?>