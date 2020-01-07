<form action="index.php?uc=Compta&action=Historiser" method="post">
    Sélectionnez l'année à historiser : <select name="lannee">
<?php
//pour chaque retour de VoirDomaines de c_Utilisateur
foreach($lesAnnees as $uneAnnee) 
{
    $annee = $uneAnnee['annee'];

echo("<option value=$annee>$annee</option>");
}
?>
</select>   <input type="submit" value="Historiser">
</form>