<div class="container">
         <br><br><br><br>
    </div>
    <div class="jumbotron container text-left text-light custom-jumbo">
<?php
$action = $_REQUEST['action'];
switch($action)
{
    case 'seconnecter':
    {
        include("vues/v_connexion.php");
        break;
    }
    case 'verifierConnexion':
    {
        $login = $_POST['login'];
        $mdp = $_POST['mdp'];

        
        $res = $pdo->verifConnexion($login, $mdp);
        $_SESSION['typeuti']=$pdo->getType($login, $mdp);

        if ($res != null)
        {
            $_SESSION['connexion'] = 1;
            echo "Bienvenue !";
        }
        else
        {
            //redirection
        }
        break;
    }
    case 'déco':
    {
        session_unset();
        session_destroy();
        break;
    }        
}
?>
</div>