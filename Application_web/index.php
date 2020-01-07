<?php
session_start();
include("vues/v_entete.php");
require_once("modele/class.pdoForma.inc.php");
include("vues/v_bandeau.php") ;


if(isset($_REQUEST['uc']))
	$uc = $_REQUEST['uc']; 
else
	$uc = 'accueil';
   

/* Création d'une instance d'accès à la base de données */
$pdo = PdoForma::getPdoForma();	 
switch($uc)
{
	case 'accueil':
		{include("vues/v_accueil.php");break;}
	case 'Utilisateur' :
		{include("controleurs/c_Utilisateur.php");break;}
	case 'Compta' :
		{include("controleurs/c_Compta.php");break;}
	case 'connexion':
		{include("controleurs/c_Connexion.php");break;}
	
}
include("vues/v_pied.php");
?>
