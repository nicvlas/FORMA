<form action="index.php?uc=Compta&action=supprimerOK" method="POST">
<!-- Affichage formation -->
Veuillez sélectionner une formation à supprimer :
<select name="laform">
<?php
//pour chaque retour de VoirDomaines de c_Utilisateur
foreach($lesFormations as $uneFormation) 
{
    $idform = $uneFormation['CODE_FORM'];
    $libform = $uneFormation['F_LIBELLE'];

echo("<option value=$idform>$libform</option>");
}
?>
</select>
<input type="submit" value="Valider">
</form>
</ul>