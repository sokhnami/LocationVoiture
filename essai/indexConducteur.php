<?php
    session_start();
    require_once("connexion/dbconnexion.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>LOCATION ACCUEIL</title>
        <link rel="stylesheet" type="text/css" href="stylecond.css">
       
    </head>
    <body >
        <!-- Hiello je suis l'entete de la page c'est moi la belle voiture qui contient les options -->
        <div id="entete"> 
            <img class="image_entete" src="image/fondindex.JPG" /> 
            <div id="trucs">
                <p class="nomsite"> Sunu oTo Bi</p> 
              
                <a href="indexConducteur.php?op=1"><b id="lesoptions" class="options">Offres</b></a> 
                <a href="indexConducteur.php?op=1"><b class="options">Espace Clients</b></a>
                <a href="indexConducteur.php?op=2"><b class="options">S'incrire</b></a>
                <a href="indexConducteur.php?op=3"><b class="options">Se connecter</b></a>
                <a href="indexConducteur.php?op=4"><b class="options">FAQ</b></a>
                                           
            </div>          
            <div id="formrecherche">
                <form name="formrecherche" method="post" action="">
                    <input id="motcle" type="text" name="motcle" placeholder="Recherche par Marque...." />
                    <input class="btnsubmit" type="submit" name="btnsumit" value="Recherche" />
                    
                </form>
                
            </div>
        </div>
        <!-- je suis la partie blanche qui est juste apres l'entete je change de contenu en fonction de l'option cliqué  -->
        <div id="blanc">
          <?php
          if (isset($_GET['op'])) {
            $opt=$_GET['op'];
            if($opt==1){
              # controle de l'option mes offres de la page indexConducteur proposer modifier supprimer offre
              echo "page offre";
            }
            elseif ($opt==2) {
                # controle de l'option Espace Auto de la page indexConducteur
                ?>
                <div id="contenu">
                <p id="error">
                     <?php
                        if (isset($_GET['error'])) {
                             $err=$_GET['error'];
                            if ($err==0 || $err==1) {
                                echo"Une erreur s'est produite.Veuillez réessayer svp !";
                            }
                            elseif ($err==2) {
                                echo "Veullez réessayer , une erreur est survenue lors du deplacement du fichier";
                            }
                            elseif ($err==3) {
                                echo "Veullez réessayer svp la taille du fichier est invalide ";
                            }
                            elseif ($err==4) {
                                echo "Veuillez réessayer ulterieurement , l'extension est invalide";
                            }
                        }
                     ?>
                    </p>  
                <form method="POST" action="traiterAuto.php" enctype="multipart/form-data" id="ajoutAuto">
                <h1>Ajouter Nouvelle Voiture...</h1>
                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" /> 
                <label for="imm">Immatriculation</label>
                <input type="text" name="imm" class="form-control" placeholder="Entrer Immatriculation" required class="champ" />
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control" placeholder="Entrer le Type" required class="champ" />
                <label for="nbre">Nombre Place</label>
                <input type="number" name="nbre" class="form-control" placeholder="Entrer le Nombre de Place" required class="champ"/>
                <label>Libelle</label>
                <input type="text" name="lib" class="form-control" placeholder="Entrer le Libellé" required class="champ"/>
                <label>Image(s)</label> 
                <input id='ims' type='file' name='ims[]' accept="image/*" multiple placeholder="Entrer" required class="champ"/><br/>
                <!--     <input id='ims' type='file' name='ims[]' accept="image/*" multiple/> -->
                <button type='submit' value='send'>Ajouter</button>
                <p><a href="indexConducteur.php" class="retour">Page Précédente</a></p>
                </form>    
              </div>        
                <?php
            }
            elseif ($opt==3) {
                # je suis la page qui permet au conducteur de valider les reservations des clients
                echo "je suis la page  de RESERVATION"; 
            }
            elseif ($opt==4) {
                # je suis la page profil  qui permet au conducteur de voir ses informations
                echo "je suis la page PROFIL";
            }
            
          }
            else
            {
            ?>
            
         <p><h1><b> Liste de mes voitures:</b></h1>
            <?php
            $conducteur= $_SESSION['id'];
            $reqselect= "select * from voiture";
            $result=$db->query($reqselect);
            $reqnbre="SELECT count(*) FROM voiture where conducteurkey='".$conducteur."'";
            $resultat=$db->query($reqnbre);
            $li=$resultat->fetch();
            $count=$li['count(*)'];
            if($count!=0){
              echo"<p> Total <b>".$count."</b> voitures...</p>";
            }
            else{
             echo "Votre liste de voiture est vide";
            }
            ?>
        </p>
        <p><a href="indexConducteur.php?op=2"><img src="image/ajouter.png" width="50px" height="50px"></a></p>
        <table>
            <!-- on affiche les voitures du conducteur courant sous forme de tableau -->
            <tr>
                <th>Immatriculation</th>
                <th>Type</th>
                <th>Nombre de Place</th>
                <th >Libellé</th>
                <th>photo</th>
                <th>Supprimer</th>
                <th>modifier</th>

            </tr>
            <?php
            while($ligne=$result->fetch(PDO::FETCH_ASSOC))
            {
                // on selectionne uniquement les voitures du conducteur courant
              if($conducteur==$ligne['conducteurkey'])
              {


            ?>
            <tr>
               <td><?php echo $ligne['imm'];?></td>
               <td><?php echo $ligne['type'];?></td>
               <td><?php echo $ligne['nbrPlace'];?></td>
               <td><?php echo $ligne['libelle'];?></td>
               <?php 
               $imm=$ligne['imm'];
               // on selectionne les images de ses voitures pour en fin en afficher une 
               $req1="select * from image where voiturekey='".$imm."'";
               $res=$db->query($req1);
               $ligni=$res->fetch(PDO::FETCH_ASSOC)
               ?>
                <td><img src="<?php echo $ligni['url'];?>" class="photo"></td>
                <td><a href="supprimer.php?sup=<?php echo $ligne['imm'];?>"><img src="image/delete.png" width="50px" height="50px"></a></td>
                 <td><a href="modifier.php?mod=<?php echo $ligne['imm'];?>"><img src="image/modifier.jpg" width="50px" height="50px"></a></td>
            </tr>
            <?php 
              }
              
            }

            ?>
        </table>
         </p>     
            <?php  
            }

            ?>
        </div>

    </body>
</html>