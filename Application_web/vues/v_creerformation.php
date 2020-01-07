<!-- ce formulaire executera creerUneFormationF de c_Compta -->
<table>
    <tr>
        <td>
            <form action="index.php?uc=Compta&action=creerUneFormationOK" method="POST">
            <!-- Sélection domaine -->
            Domaine :
            <select name="lenvdom">
                <?php
                    //pour chaque retour de VoirDomaines de c_Utilisateur
                    foreach($lesDomaines as $unDomaine) 
                    {
                        $iddom = $unDomaine['CODE_DOM'];
                        $libdom= $unDomaine['D_LIBELLE'];

                        echo("<option value=$iddom>$libdom</option>");
                    }
                ?>
            </select>
            </td>
    </tr>
    <tr>
            <td>
                Code de la formation : <input type="number" name="codeform" required>
            </td>
    </tr>
    <tr>
            <td>
                Libellé de la formation : <input type="text" name="libelleform" required>
            </td>
    </tr>
    <tr>
            <td>
                Objectifs : <input type="textarea" name="objectifsform" required>
            </td>
    </tr>
    <tr>
            <td>
                Contenu : <input type="textarea" name="contenuform" required>
            </td>
    </tr>
    <tr>
            <td>
                Prix : <input type="number" name="prixform" required>
            </td>
    </tr>
    <tr>
            <td>
                Support inclus : <input type="text" placeholder="O/N" name="supportform" required>
            </td>
    </tr>
    <tr>
            <td>
                Date limite : <input type="date" placeholder="AAAA-MM-JJ" name="dateform" required>
            </td>
    </tr>
    <tr>
            <td>
                Nombre de places : <input type="number" name="placesform" required>
            </td>
    </tr>
    <tr>
            <td>
                Type : <input type="text" placeholder="B/S/T" name="typeform" required>
            </td>
    </tr>
    </table>
            <input type="submit" value="Valider">
            </form>
        
    

