<div class="container-fluid">
    <h3 class="text-center text-light">Voici les formations auxquels vous êtes inscrit.</h3>
    <table class="table table-lg table-bordered table-striped table-hover bg-light">
        <thead>
            <tr class="bg-secondary">
                <th scope="col" style="width: 14.25%">Nom</th>
                <th scope="col" style="width: 14.25%">Objectifs</th>
                <th scope="col" style="width: 18%">Contenu</th>
                <th scope="col" style="width: 7%">Prix</th>
                <th scope="col" style="width: 7%">Date limite d'inscription</th>
                <th scope="col" style="width: 7%">Support</th>
                <th scope="col" style="width: 7%">Nombre de places disponibles</th>
            </tr>
        </thead>
        <tbody>
        <?php
        foreach($mesFormations as $laform)
        {
            echo "<tr>";

            $libelle = $laform['F_LIBELLE'];
            $objectifs = $laform['OBJECTIFS'];
            $contenu = $laform['CONTENU'];
            $prix = $laform['PRIX'];
            $support = $laform['SUPPORT_INCLUS'];
            $date = $laform['DATE_LIMITE'];
            $nbplaces = $laform['NB_PLACES'];

            echo"<td>$libelle</td>";
            echo"<td>$objectifs</td>";
            echo"<td>$contenu</td>";
            echo"<td>$prix €</td>";
            echo"<td>$date</td>";

            if($support=='N')
            {echo"<td>Non inclus</td>";}
            else
            {echo"<td>Inclus</td>";}
            echo"<td>$nbplaces</td>";

            echo "</tr>";
        }
        ?>
        <tbody>
    </table>
</div>