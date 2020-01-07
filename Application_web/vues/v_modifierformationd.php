<form action="index.php?uc=Compta&action=modifierFormationF" method="POST">
            <!-- Sélection domaine -->
            Domaine :
            <select name="ledom">
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
            <input type="submit">
</form>