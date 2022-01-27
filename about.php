<section class="page-section" id="commercial">
            <div class="container">
                

            <h1>La liste des ventes</h1>

            <?php
            $connexion=mysqli_connect("localhost","root","", "commerce");
                
                $resultat=$connexion->query("SELECT * FROM commercial");

                echo "<table class='table table-dark'>";
                echo "<tr><th>ID</th>
                <th>Nom</th>
                <th>Nombre de ventes</th>
                <th>NCA Total</th>
                <th></th><th></th>
                </tr>";
                while ($ligne=$resultat->fetch_assoc()){

                    echo "<tr>
                    <td>".$ligne['Id_Commercial']."</td>
                    <td>".$ligne['Nom_Commercial']."</td>";

                    $resultat1=$connexion->query("SELECT count(*) as compte
                    FROM vente WHERE Id_Com=".$ligne['Id_Commercial']."");
                    $ligne1=$resultat1->fetch_assoc();
                    echo "<td> ". $ligne1['compte'] ." </td>";

                    $resultat2=$connexion->query("SELECT sum(CA_Vente) as Total
                    FROM vente WHERE Id_Com=".$ligne['Id_Commercial']."");
                    $ligne2=$resultat2->fetch_assoc();
                    echo "<td> ". $ligne2['Total'] ." </td>

                    <td><a  class='btn btn-warning' href='#'> Modifier</a></td>
                    <td><a  class='btn btn-danger' href='#'> Supprimer</a></td>
                    </tr>";

                }
                echo "</table>";


$resultat3=$connexion->query("SELECT max(CA_Vente) as maxvente FROM vente");
            $ligne3=$resultat3->fetch_assoc();
$resultat4= $connexion->query("SELECT Nom_Commercial FROM vente,commercial 
        WHERE vente.Id_Com=commercial.Id_Commercial and CA_Vente=".$ligne3['maxvente']."");
            $ligne4=$resultat4->fetch_assoc();
                
            echo "Le chiffre d'affaire maximum est ". $ligne3['maxvente']."</br>";
            echo "le meilleur comercial est " . $ligne4['Nom_Commercial'];
                ?>

            </div>
        </section>
       