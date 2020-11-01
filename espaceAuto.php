<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8" />
   <title></title>
   <link rel="stylesheet" type="text/css" href="styleAuto.css" >

</head>

<body>

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
                # code...
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
</body>
</html>
