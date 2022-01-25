  <section class="page-section bg-light" id="produit">
            <div class="container">
                <div class="text-center">
                
                <?php  
                $connexion=mysqli_connect("localhost","root","", "commerce");
                
                $resultat=$connexion->query("SELECT * FROM produits");

                echo "<table class='table table-dark'>";
                echo "<tr><th>ID</th>
                <th>Nom</th>
                <th>Prix</th>
                <th></th><th></th>
                </tr>";
                while ($ligne=$resultat->fetch_assoc()){

                    echo "<tr>
                    <td>".$ligne['Id_Produit']."</td>
                    <td>".$ligne['Nom_Produit']."</td>
                    <td>".$ligne['Prix_Produit']."</td>
                    <td><a  class='btn btn-warning' href='#'> Modifier</a></td>
                    <td><a  class='btn btn-danger' href='#'> Supprimer</a></td>
                    </tr>";

                }
                echo "</table>";
                
                ?>




            </div>
        </section>