<!-- VUE POUR AFFICHER SELECT OPTION DES FORMATIONS EN FONCTION DU DOMAINE SÉLECTIONNÉ -->
<ul id="categories">
                                        <!-- il faut faire passer en paramètre l'id domaine utilisé dans la page d'avant pour le réutiliser dans l'url & dans le switch -->
<form action="index.php?uc=Utilisateur&action=voirSessions" method="POST">
<!-- Affichage formation -->
Veuillez sélectionner une formation :
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