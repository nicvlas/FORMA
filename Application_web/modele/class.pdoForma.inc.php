<?php 
/**
 * 
 */
class PdoForma
{
	//attribut privé
	private static $monPdo;
	private static $monPdoForma = null;

	//constructeur privée
	private function __construct()
	{
		PdoForma::$monPdo = new PDO('mysql:host=localhost;dbname=bdd_m2l', 'root', ''); 
		PdoForma::$monPdo->query("SET CHARACTER SET utf8");
	}

	//coupe la connexion à la BDD
	public function _destruct(){
		PdoForma::$monPdo = null;
	}

	//créé unique instance de la classe
	public static function getPdoForma()
	{
		if(PdoForma::$monPdoForma == null)
		{
			PdoForma::$monPdoForma= new PdoForma();
		}
		return PdoForma::$monPdoForma;  
	}

	//récupère les domaines de formation
	public function getLesDomaines()
	{
		$req = "SELECT * FROM domaine";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//récupère les formations en fonction du code domaine
	public function getLesFormations($codeDomaine)
	{
		$req = "SELECT CODE_FORM, F_LIBELLE
				FROM formation f
				WHERE CODE_DOM='$codeDomaine'";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//récupère toutes les infos d'une formation
	public function getInfosFormations($codeDomaine, $codeFormation)
	{
		$req = "SELECT CODE_DOM, CODE_FORM, F_LIBELLE, OBJECTIFS, CONTENU, PRIX, SUPPORT_INCLUS, DATE_LIMITE, NB_PLACES, TYPE
				FROM formation
				WHERE CODE_DOM='$codeDomaine'
				AND CODE_FORM='$codeFormation';";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//récupère toutes les sessions groupées par domaine & formation
	public function getLesSessions($cd, $cf)
	{
		$req = "SELECT CODE_SESSION, S_LIBELLE
				FROM session
				WHERE CODE_DOM='$cd'
				AND CODE_FORM='$cf'";
		
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	//créer une formation
	public function creerFormation($cd, $cf, $lib, $obj, $cont, $prix, $sup, $date, $places, $type)
	{
		$req = "INSERT INTO formation VALUES ($cd, $cf, '$lib', '$obj', '$cont', $prix, '$sup', '$date', $places, '$type')";
		$res = PdoForma::$monPdo->exec($req) or die ('Erreur !');
	}
	
	//update formation
	public function updateForm($cd, $cf, $lib, $obj, $cont, $prix, $sup, $date, $places, $type)
	{
		$req = "UPDATE FORMATION SET CODE_DOM = $cd, CODE_FORM = $cf, F_LIBELLE = '$lib', OBJECTIFS = '$obj', CONTENU = '$cont', PRIX = $prix, SUPPORT_INCLUS = '$sup', DATE_LIMITE = '$date', NB_PLACES = $places, TYPE = '$type' WHERE CODE_DOM = $cd and CODE_FORM= $cf";
		$res = PdoForma::$monPdo->exec($req) or die ('Erreur de mise à jour !');
	}

	//vérifie combien l'utilisateur a suivi de form et inscrit ou pas l'utilisateur selon les critères de faisabilité
	public function checkNbFormSuiviesInscription($idutil, $cd, $cf, $cs)
	{
		//check nb formations suivies
		$req = "SELECT NBFORMSUIVIES
				FROM utilisateur
				WHERE NO_UTILISATEUR ='$idutil'";

		$res = PdoForma::$monPdo->query($req);
		$nbform = $res -> fetch();

		//check domaines des form suivies
		$req = "SELECT COUNT(*) as LaFormation
				FROM inscrits
				WHERE NO_UTILISATEUR = '$idutil'
				AND CODE_DOM='$cd'
				AND ETAT='ENR'";
		
		$res = PdoForma::$monPdo->query($req);
		$nbdom = $res -> fetch();

		//si il a déjà suivi 3 formations ou si 2 dans le même domaine
		if(($nbform['NBFORMSUIVIES'] == 3))
		{
			echo("Vous ne pouvez pas vous inscrire à cette formation. Vous avez atteint votre quota de formations.");
		}
		if($nbdom['LaFormation'] == 2 && $nbform['NBFORMSUIVIES'] == 3 || $nbform['NBFORMSUIVIES'] == 3)
		{
			echo("Vous ne pouvez pas vous inscrire à cette formation. Vous avez atteint votre quota de formations dans ce domaine.");
		}
		else
		{
			//vérification du type de formation
			$req = "SELECT TYPE
				FROM formation
				WHERE CODE_DOM='$cd'
				AND CODE_FORM='$cf'";
			$res = PdoForma::$monPdo->query($req);
			$_SESSION['type'] = $res -> fetch();

			//vérification du type de l'utilisateur
			$req = "SELECT U_STATUT
					FROM utilisateur
					WHERE NO_UTILISATEUR='$idutil'";
			$res = PdoForma::$monPdo->query($req);
			$_SESSION['typeuti'] = $res->fetch();


			//si la formation est pour bénévoles ET utilisateur est salarié		OU		si form est pour salariés et utilisateur est bénévole
			if( (($_SESSION['type']['TYPE'] == 'B') && ($_SESSION['typeuti']['U_STATUT'] == 'S')) || ( ($_SESSION['type']['TYPE'] == 'S') && ($_SESSION['typeuti']['U_STATUT'] == 'B') )  )
			{
				echo'Cette formation ne vous est pas destinée.';
			}

			//si form est pour tous et utilisateur est un bénévole ou salarié
			if ((($_SESSION['type']['TYPE'] == 'T') &&  (($_SESSION['typeuti']['U_STATUT'] == 'B') || ($_SESSION['typeuti']['U_STATUT'] == 'S'))) || ((($_SESSION['type']['TYPE'] == 'B') && ($_SESSION['typeuti']['U_STATUT'] == 'B')) || (($_SESSION['type']['TYPE'] == 'S') && ($_SESSION['typeuti']['U_STATUT'] == 'S'))))
			{
				$date_now = date("Y");
				//inscription, prend état ENR (enregistré)
				$req = "INSERT INTO inscrits VALUES ($idutil, $cd, $cf, $cs, 'ENR', $date_now)";
				$res = PdoForma::$monPdo->exec($req) or die ("Erreur, vous êtes déjà inscrit !");
				echo("Inscription effectuée avec succès !");

				//ajout formation suvie
				$req = "UPDATE utilisateur
						SET NBFORMSUIVIES = NBFORMSUIVIES + 1
						WHERE NO_UTILISATEUR = '$idutil'";
				$res = PdoForma::$monPdo->exec($req);

				//enlève une place à la formation
				$req = "UPDATE formation
						SET NB_PLACES = NB_PLACES - 1
						WHERE CODE_DOM = '$cd'
						AND CODE_FORM='$cf'";
				$res = PdoForma::$monPdo->exec($req);
				
			}
		}
	}

	//Récupère les sessions la semaine avant le début
	public function getLesSessionsDansUneSemaine()
	{
		$aujourdhui = date("Y-m-d");
		$dansunesemaine = date("Y-m-d", strtotime("+7 day", strtotime($aujourdhui)));

		$req = "SELECT F.F_LIBELLE, S.S_LIBELLE, F.CODE_DOM, F.CODE_FORM, S.CODE_SESSION
		FROM FORMATION F, SESSION S
		WHERE F.CODE_DOM = S.CODE_DOM   
		AND F.CODE_FORM = S.CODE_FORM
		AND S.S_DATE BETWEEN '$aujourdhui' AND '$dansunesemaine'";
		$res = PdoForma::$monPdo->query($req) or die('aucune');
		$lesFormations = $res -> fetchAll();
		return $lesFormations;

	}

	public function getLesParticipantsAuxFormations($cd, $cf, $cs)
	{

		$req = "SELECT DISTINCT U_NOM, U_PRENOM
				FROM UTILISATEUR U, INSCRITS I, FORMATION F, DOMAINE D, SESSION S
				WHERE U.NO_UTILISATEUR = I.NO_UTILISATEUR
				AND F.CODE_DOM = D.CODE_DOM
				AND F.CODE_FORM = S.CODE_FORM
				AND I.CODE_DOM = $cd
				AND I.CODE_FORM = $cf
				AND I.CODE_SESSION = $cs";

		$res = PdoForma::$monPdo->query($req) or die ("aucun participant");
		$lesParticipants = $res -> fetchAll();
		return $lesParticipants;
	}

	public function getLesParticipantsSelonAnnee($annee)
	{

		$req = "SELECT count(distinct i.no_utilisateur) as 'inscrits', f.f_libelle
				from utilisateur u, inscrits i, domaine d, formation f, session s
				where i.no_utilisateur = u.no_utilisateur
				and d.code_dom = f.code_dom
				and f.code_form = s.code_form
				and i.annee=2019
				group by i.code_dom, i.code_form, i.code_session";

		$res = PdoForma::$monPdo->query($req) or die ("aucun participant");
		$lesParticipants = $res -> fetchAll();
		return $lesParticipants;
	}

	public function getAnnees()
	{
		$req = "select distinct annee
				from inscrits";
		$res = PdoForma::$monPdo->query($req);
		$lesAnnees = $res->fetchAll();
		return $lesAnnees;
	}

	public function Historiser()
	{
		//récupération date de la dernière session de la bdd
		$req = "SELECT F_LIBELLE, MAX(DATE_LIMITE)
				FROM formation";
		$res = PdoForma::$monPdo->query($req);
		$laDate = $res->fetchAll();

		//récupération date système
		$aujourdhui = date("Y-m-d");

		//si on est le jour de la dernière session voire plus tard
		if($laDate <= $aujourdhui)
		{
			
		}
	}
	//supprime les formations ainsi que ses sessions et inscrits associés
	public function supprimerFormaEtSessionsAssociees($cd, $cf)
	{
		//suppr de inscrits
		$req = "DELETE FROM inscrits WHERE CODE_DOM = $cd and CODE_FORM = $cf";
		$res = PdoForma::$monPdo->exec($req) or die ('Erreur inscrits');

		//suppr de session
		$req = "DELETE FROM session WHERE CODE_DOM = $cd and CODE_FORM = $cf";
		$res = PdoForma::$monPdo->exec($req) or die ('erreur session');

		//suppr de formation
		$req = "DELETE FROM formation WHERE CODE_DOM = $cd AND CODE_FORM = $cf";
		$res = PdoForma::$monPdo->exec($req) or die ('erreur formation');
		
	}

	public function verifConnexion($login, $mdp)
	{
		$req = "SELECT Login, Mdp
				FROM utilisateur
				WHERE LOGIN='$login'
				AND mdp='$mdp';";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}

	public function getType($login, $mdp)
	{
		$req = "SELECT U_STATUT
				FROM utilisateur
				WHERE login='$login'
				AND mdp='$mdp';";
		$res = PdoForma::$monPdo->query($req);
		$lesLignes = $res->fetchAll();
		return $lesLignes;
	}
}
?>