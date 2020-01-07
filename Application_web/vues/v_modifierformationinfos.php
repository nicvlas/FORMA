<?php
foreach($lesInfos as $uneInfo)
{
    $cd = $uneInfo['CODE_DOM'];
    $cf = $uneInfo['CODE_FORM'];
    $lib = $uneInfo['F_LIBELLE'];
    $obj = $uneInfo['OBJECTIFS'];
    $contenu = $uneInfo['CONTENU'];
    $prix = $uneInfo['PRIX'];
    $supp = $uneInfo['SUPPORT_INCLUS'];
    $date = $uneInfo['DATE_LIMITE'];
    $places = $uneInfo['NB_PLACES'];
    $type = $uneInfo['TYPE'];
}
?>
<form action="index.php?uc=Compta&action=modifierFormationOKOK" method="post">
    <table>
    <tr>
            <td>
                        Code domaine : <input type='text' name='coded' value="<?php echo $cd; ?>" disabled >
            </td>
        </tr>
        <tr>
            <td>
                        Code formation : <input type='text' name='codef' value="<?php echo $cf; ?>" disabled>
            </td>
        </tr>
        <tr>
            <td>
                        Libellé : <input type='text' name='libform' value="<?php echo $lib; ?>">
            </td>
        </tr>
        <tr>
            <td>
                        Objectifs : <textarea name="objectifsform" required id="" cols="30" rows="5"><?php echo $obj; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                        Contenu : <textarea name="contenuform" id="" cols="30" rows="5" required ><?php echo $contenu; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>
                        Prix : <input type='number' name='prixform' value="<?php echo $prix; ?>" required>
            </td>
        </tr>
        <tr>
            <td>
                        Support inclus : <input type='text' placeholder='O/N' value="<?php echo $supp; ?>" name='supportform' required>
            </td>
        </tr>
        <tr>
            <td>
                        Date limite : <input type='date' placeholder='AAAA-MM-JJ' value="<?php echo $date; ?>" name='dateform' required>
            </td>
        </tr>
        <tr>
            <td>
                        Nombre de places : <input type='number' value="<?php echo $places; ?>" name='placesform' required>
            </td>
        </tr>
        <tr>
            <td>
                        Type : <input type='text' placeholder='B/S/T' value="<?php echo $type; ?>" name='typeform' required>
            </td>
        </tr>
    </table>
    <input type="submit" value="Valider">
</form>