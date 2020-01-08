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
}
?>