Liste(s) des participants aux formations prêtes :
    <!-- Sélection domaine -->
        <?php
            //pour chaque retour de VoirDomaines de c_Utilisateur
            foreach($lesFormations as $uneFormation) 
            {
                $lib = $uneFormation['F_LIBELLE'];
                $ses = $uneFormation['S_LIBELLE'];
                $dom = $uneFormation['CODE_DOM'];
                $form = $uneFormation['CODE_FORM'];
                $ses = $uneFormation['CODE_SESSION'];

                echo("<li><a href='index.php?uc=Compta&dom=$dom&form=$form&ses=$ses&action=getParticipants'>$lib - session $ses</a></li>");
                
            }
        ?>
