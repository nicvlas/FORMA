<?php
include("vues/v_entete.php");
session_start();
require_once("modele/class.pdoForma.inc.php");
include("vues/v_bandeau.php") ;

//$_SESSION['idUtil']=1;
//initialisation de variables de session pour la consultation des formations


$_SESSION['connexion']=0;//pas connecté faux





if ( (isset($_SESSION['dom'])) && (isset($_SESSION['form'])) && (isset($_SESSION['session'])) ){
$_SESSION['dom'];
$_SESSION['form'];
$_SESSION['session'];
}
if(!isset($_REQUEST['uc']))
     $uc = 'accueil';
else
    $uc = $_REQUEST['uc'];
   

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
