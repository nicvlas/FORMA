<div class="container">
         <br><br><br><br>
    </div>
    <div class="jumbotron container text-left text-light custom-jumbo">
<?php
$action = $_REQUEST['action'];
switch($action)
{
	case 'creerUneFormation':
	{
		$lesDomaines=$pdo->getLesDomaines();
		include("vues/v_creerformation.php");
		break;
	}
	case 'creerUneFormationOK':
	{
		//récupération des valeurs
		$cd = $_POST['lenvdom'];
		$cf = $_POST['codeform'];
		$lib =$_POST['libelleform'];
		$obj =$_POST['objectifsform'];
		$cont =$_POST['contenuform'];
		$prix = $_POST['prixform'];
		$sup = $_POST['supportform'];
		$date = $_POST['dateform'];
		$places = $_POST['placesform'];
		$type = $_POST['typeform'];
		//echo $cd, $cf, $lib, $obj, $cont, $prix, $sup, $date, $places, $type;
		//appel de la fonction de la classe pdo avec les parametres récupérés
		$pdo->creerFormation($cd, $cf, $lib, $obj, $cont, $prix, $sup, $date, $places, $type);
		echo "Création effectuée avec succès";
		break;
	}
	case 'modifierUneFormationD':
	{
		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_modifierformationd.php");
		break;
	}
	case 'modifierFormationF':
	{
		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_modifierformationd.php");

		$_SESSION['dom'] = $_POST['ledom'];//récup id domaine

		$lesFormations = $pdo->getLesFormations($_SESSION['dom']);
		include("vues/v_modifierformationf.php");
		break;
	}
	case'modifierFormationOK':
	{
		$_SESSION['formid'] = $_POST['laform'];//id formation

		//affichage vues
		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_modifierformationd.php");

		$lesFormations = $pdo->getLesFormations($_SESSION['dom']);
		include("vues/v_modifierformationf.php");

		$lesInfos = $pdo->getInfosFormations($_SESSION['dom'], $_SESSION['formid']);
		include("vues/v_modifierformationinfos.php");
		break;
	}
	case 'modifierFormationOKOK':
	{
		//récupère champs
		$lib = $_POST['libform'];
		$obj = $_POST['objectifsform'];
		$contenu = $_POST['contenuform'];
		$prix = $_POST['prixform'];
		$sup = $_POST['supportform'];
		$date = $_POST['dateform'];
		$places = $_POST['placesform'];
		$type = $_POST['typeform'];
		//update
		$pdo->updateForm($_SESSION['dom'], $_SESSION['formid'], $lib, $obj, $contenu, $prix, $sup, $date, $places, $type);
		echo "Mise à jour OK";
		break;
	}





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

		$lesInfos = $pdo->getInfosFormations($_SESSION['dom'], $_SESSION['form']);
		include("vues/v_consultercatalogues.php");

		$lesSessions = $pdo->getLesSessions($_SESSION['dom'], $_SESSION['form']);
		include("vues/v_consultercatalogues.php");
		break;
	}




	//récupère les formations pour lesquelles la liste est prête : si on est la semaine avant le début
	case 'listeParticipants':
	{
		$lesFormations = $pdo -> getLesSessionsDansUneSemaine();
		include("vues/v_listeparticipants.php");
		
		break;
	}
	//recherche les participants et les affiche dans un pdf puis le renvoie
	case 'getParticipants':
	{
		//récupération des variables
		$libform = (string)$_REQUEST['lib'];
		$dom = $_REQUEST['dom'];
		$form = $_REQUEST['form'];
		$ses = $_REQUEST['ses'];

		ob_end_clean();

		require('..\fpdf182\fpdf.php');

		$lesParticipants = $pdo -> getLesParticipantsAuxFormations($dom, $form, $ses);

		if ($lesParticipants > 0){
			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(40,10, "LISTE DES PARTICIPANTS A LA FORMATION, SESSION ".$ses." : ");

			$j=1;
			$k=30;
			foreach($lesParticipants as $unParticipant)
			{

				$k=$k+30;

				$pdf->Cell($j,$k, $unParticipant['U_NOM']." ".$unParticipant['U_PRENOM']);
			}
		}

		if($lesParticipants == null)
		{
			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(40,10, "AUCUN PARTICIPANT");
		}
		$pdf->Output();
		break;
	}



	case 'Historiser':
	{
		$lesAnnees = $pdo -> getAnnees();
		include("vues/v_historiser.php");
		//recup année
		if (isset($annee))
		{
			$_SESSION['annee'] = $_POST['lannee'];
		}

		$lesParticipants = $pdo->getLesParticipantsSelonAnnee($_SESSION['annee']);
		include("vues/v_tableauhistorisation.php");
	}



	case 'supprimerUneFormationD':
	{
		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_supprformad.php");
  		break;
	}
	case 'supprformaF':
	{
		// ré-affichage
		$lesDomaines = $pdo->getLesDomaines();
		include("vues/v_supprformad.php");
		//récup select 
		$_SESSION['dom'] = $_POST['ledom'];
		//traitement
		$lesFormations = $pdo->getLesFormations($_SESSION['dom']);
		include("vues/v_supprformaf.php");
		break;
	}
	case 'supprimerOK':
	{
		//récup select
		$_SESSION['form'] = $_POST['laform'];

		$pdo->supprimerFormaEtSessionsAssociees($_SESSION['dom'], $_SESSION['form']);

		echo "Suppression effectuée.";

		break;
	}
}
?>
</div>