<!-- VUE POUR AFFICHER LES SESSIONS DES FORMATIONS DES DOMAINES -->
<ul id="categories">
<form action="index.php?uc=Utilisateur&action=inscriptionOK" method="POST">
<!-- Affichage infos formation -->
Informations sur la formation sélectionnée :
<table border='1'>
    <tr>
        <td>Libellé</td>
        <td>Objectifs</td>
        <td>Contenu</td>
        <td>Prix</td>
        <td>Date limite d'inscription</td>
        <td>Support</td>
        <td>Nombre de places disponibles</td>
    </tr>
    <tr>
        <?php
        foreach($lesInfos as $uneInfo)
        {
            $lib = $uneInfo['F_LIBELLE'];
            $obj = $uneInfo['OBJECTIFS'];
            $contenu = $uneInfo['CONTENU'];
            $prix = $uneInfo['PRIX'];
            $supp = $uneInfo['SUPPORT_INCLUS'];
            $date = $uneInfo['DATE_LIMITE'];
            $places = $uneInfo['NB_PLACES'];

            echo"<td>$lib</td>";
            echo"<td>$obj</td>";
            echo"<td>$contenu</td>";
            echo"<td>$prix €</td>";
            echo"<td>$date</td>";

            if($supp=='N')
            {echo"<td>Non inclus</td>";}
            else
            {echo"<td>Inclus</td>";}

            echo"<td>$places</td>";

        }
        ?>
    </tr>
</table>
<?php
if($places == 0)
{
    echo "<br><br><b>Plus de place disponible.</b>";
}
else
{
?>
<br><br>Veuillez sélectionner une session :
<select name="lasession">
<?php
    //pour chaque retour de VoirDomaines de c_Utilisateur
    foreach($lesSessions as $uneSession) 
    {
        $idsession = $uneSession['CODE_SESSION'];
        $libsession = $uneSession['S_LIBELLE'];

        echo"<option value=$idsession>$libsession</option>";
    }
    $date_now = date("m-d");

    if ($date_now > '09-01')
    {
        echo '<input type="submit" value="Inscription">';
    }
    else
    {
        echo "Inscription non ouverte. Ouverture le 1er septembre.";
    }


}
?>
</select>

</form>
</ul>