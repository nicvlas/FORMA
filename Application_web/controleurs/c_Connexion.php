<div class="container">
         <br><br><br><br>
</div>
<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'connexion':
    {
        include("vues/v_connexion.php");
        break;
    }
    case 'authentification':
    {
        $login = $_POST['identifiant'];
        $mdp = $_POST['mdp'];

        
        $success = $pdo->verifConnexion($login, $mdp);

        //$_SESSION['typeuti'] = $pdo->getTypeUtil($login, $mdp);

        if ($success == "yes")
        {
            $_SESSION['logged'] = $pdo->getNumUtil($login);
            $_SESSION['type_util'] = $pdo->getTypeUtil($_SESSION['logged']);

            $message = "Bienvenue !";
            include("vues/v_message.php");
            header('Location:index.php');
        }
        else
        {
            $message = "Identifiant ou mot de passe incorrect.";

            include("vues/v_message.php");
            include("vues/v_connexion.php");
        }
        break;
    }
    case 'logout':
    {
        session_unset();
        session_destroy();

        $message = "Vous avez été déconnecté avec succès !";
        include("vues/v_message.php");
        header('Location:index.php');
        break;
    }
    case 'pagecreercompte':
    {
        include("vues/v_creationcompte.php");
        break;
    }
    case 'creercompte':
    {
        $prenom = $_POST['util_prenom'];
        $nom = $_POST['util_nom'];
        $mail = $_POST['util_mail'];
        $adresse = $_POST['util_adresse'];
        $cp = $_POST['util_cp'];
        $ville = $_POST['util_ville'];
        $association = $_POST['util_assoc'];
        $fonction = $_POST['util_fonction'];
        $statut = $_POST['util_statut'];

        $util_id = $pdo->creerCompte($prenom,$nom,$mail,$adresse,$cp,$ville,$association,$fonction,$statut);
        $identifiantConnexion = $pdo->getIdentifiantConnexion($util_id);

        $message = "Vous venez de créer votre compte M2L, Bravo !<br>
                    Votre login : $identifiantConnexion et votre mot de passe : $identifiantConnexion";
        include("vues/v_message.php");
        include("vues/v_connexion.php");
        break;
    }
}
?>