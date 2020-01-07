<div class="container">
         <br><br><br><br>
    </div>
    <div class="jumbotron container text-left text-light custom-jumbo">
<?php

$action = $_REQUEST['action'];
switch($action)
{
	//retourne tous les domaines
	case 'voirDomaines':
	{
  		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_consultercatalogued.php");
		
  		break;
	}

	//retourne les formations en fonction du domaine sélectionné dans le select option
	case 'voirFormations':
	{
		// ré-affichage
		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_consultercatalogued.php");
		//récup select 
		$_SESSION['dom'] = $_POST['ledom'];
		//traitement
		$lesFormations = $pdo->getLesFormations($_SESSION['dom']);
		include("vues/v_consultercataloguef.php");
		
		break;
	}

	//retourne les formations en fonction du domaine et la formation
	case 'voirSessions':
	{	//récup select
		$_SESSION['form'] = $_POST['laform'];
		//ré-affichage
		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_consultercatalogued.php");

		$lesFormations = $pdo->getLesFormations($_SESSION['dom']);
		include("vues/v_consultercataloguef.php");

		//récupération des infos de la formation + sessions et affichage
		$lesInfos = $pdo->getInfosFormations($_SESSION['dom'], $_SESSION['form']);

		$lesSessions = $pdo->getLesSessions($_SESSION['dom'], $_SESSION['form']);
		include("vues/v_consultercatalogues.php");
		break;
	}

	case 'inscriptionOK':
	{
		$_SESSION['session'] = $_POST['lasession'];
		$pdo->checkNbFormSuiviesInscription($_SESSION['typeuti']['U_STATUT'], $_SESSION['dom'], $_SESSION['form'], $_SESSION['session']);
		break;
	}
}
?>
</div>