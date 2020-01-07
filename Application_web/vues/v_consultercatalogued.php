<!-- VUE POUR CONSULTER LES DOMAINES/AFFICHER SELECT OPTION DES DOMAINES -->

        <ul id="categories">
        <form action="index.php?uc=Utilisateur&action=voirFormations" method="POST">
        <!-- Sélection domaine -->
        Veuillez sélectionner un domaine :
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
        <input type="submit" value="Valider">
        </form>
        </ul>
