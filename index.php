<script type="text/javascript">
	setTimeout(() => {
		window.location.reload();
	}, 10 * 60 * 1000); // 10 minutes
</script>
<!DOCTYPE html>
<html>

<head>
	<link href="css/style.css" rel="stylesheet">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes" />
	<meta name="viewport" content="width=device-width" />
	<meta charset="utf-8">
	<title>Sudouest.fr - JO - Classements des médailles</title>
</head>

<body style="background-color: white;margin:0;padding:0;">
	<?php
	include(dirname(__FILE__) . '/includes/ddc.php');
	include(dirname(__FILE__) . '/includes/singPluriel.php');

	function style($pays)
	{
		if ($pays == 'France') {
			return "background-color: #62bdff; font-weight: bold;";
		}
		return "";
	}

	$apiUrl = "https://og2026-api.sports.gracenote.com/svc/games_v2.svc/json/GetMedalTable_Season?competitionSetId=2&season=20252026&languageCode=4";

	$json = @file_get_contents($apiUrl);
	$data = json_decode($json, true);
	$medalEntries = $data['MedalTableNOC'] ?? [];

	// Table de correspondance pour renommer les pays
	$remplacements = [
		'Tchéquie' => 'Rép. Tchèque',
		'Corée'    => 'Corée du Sud'
	];

	echo '
	<section class="margincenter">
		<img class="visu" src="css/images/visu.png" alt=" ">
		<h2>Le tableau des médailles</h2>
		<table class="table">
			<thead>
				<tr>
					<th class="" colspan="3"></th>  
					<th class="medailles fdor"></th>
					<th class="medailles fdargent"></th>
					<th class="medailles fdbronze"></th> 
					<th class="date fdvert">Tot.</th>  
				</tr>
			</thead>
			<tbody>';

	$lastRank = null;

	foreach ($medalEntries as $entry) {
		$paysNomOriginal = $entry['c_NOC'];
		$paysNomFinal = $remplacements[$paysNomOriginal] ?? $paysNomOriginal;

		// --- Gestion du Drapeau ---
		$nomImage = ddc($paysNomFinal) . '.png';
		$cheminLocal = dirname(__FILE__) . '/css/images/' . $nomImage;

		// Si le fichier n'existe pas physiquement sur le serveur, on utilise vide.png
		if (!file_exists($cheminLocal) || is_dir($cheminLocal)) {
			$nomImage = 'vide.png';
		}

		// --- Gestion du Rang ---
		$currentRank = $entry['n_RankGold'];
		$displayRank = ($currentRank === $lastRank) ? '-' : $currentRank;
		$lastRank = $currentRank;

		echo '<tr style="' . style($paysNomOriginal) . '">
				 		<td><img class="DrapeauxGrands" src="css/images/' . $nomImage . '" alt=" "></td>
				 		<td class="centre">' . $displayRank . '</td>
				 		<td class="TableauEquipe">' . $paysNomFinal . '</td>
				 		<td class="centre">' . $entry['n_Gold'] . '</td>
				 		<td class="centre">' . $entry['n_Silver'] . '</td>
				 		<td class="centre">' . $entry['n_Bronze'] . '</td>
				 		<td class="centre">' . $entry['n_Total'] . '</td>
				</tr>';
	}

	echo '</tbody>
	</table>
	<footer></footer>
	</section>';
	?>
</body>

</html>