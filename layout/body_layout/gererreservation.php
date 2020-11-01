<!-- ======= Portfolio Section ======= -->
<div id="portfolio" class="portfolio-area area-padding fix">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Nos offres</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Team member -->
          <?php
          $sth = $db->prepare("Select * from voiture where Quantite>0");
          $sth->execute();
          $i = 0;
          if ($sth->rowCount()) {
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
              $i++;
              // recupération des données lier à l'offre
              $immatriculation = $row['Immatriculation'];
              $type = $row['Type'];
              $libelle = $row['Libelle'];
              $quantite = $row['Quantite'];
              $gerantId = $row['GerantId'];
              $dateCreation = $row['DateCreation'];
  
              // Recupération du conducteur
              $conduct = $db->prepare("Select * from utilisateur where Id = $gerantId");
              $conduct->execute();
              $row_conduct = $conduct->fetch(PDO::FETCH_ASSOC);
              $gerant = $row_conduct['nom'] . ' ' . $row_conduct['prenom'];
              if ($i == 1) {
                echo '<div class="row">';
              }
              $reservation = 'reservation' . uniqid();
              $quantite = 'quantite' . uniqid();
              $editInput = 'editInput' . uniqid();
                   echo '<div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip" ontouchstart="this.classList.toggle(\'hover\');">
                      <div class="mainflip">
                        <div class="frontside">
                          <div class="card">
                          <div class="card-body text-center">
                            <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                            <h4 class="card-title">Immatriculation: ' . $immatriculation . '</h4>
                            <p class="card-title">Type de voiture: ' . $type . '</p>
                            <p class="card-title">Libelle: ' . $libelle . '</p>
                            <p class="card-title">Nombre de voiture: ' . $quantite . '</p>
                            <p class="card-title">Gerant: ' . $gerant . '</p>
                            <input type="hidden" id="' . $editInput . '" name="' . $editInput . '" value="' . $immatriculation . '" />
                          </div>
                          </div>
                        </div>
                        <div class="backside">
                          <div class="card">
                            <div class="card-body text-center mt-4">
                              <h4 class="card-title">Sunlimetech</h4>
                              <p class="card-text">Inserons ici une image de la voiture a reserver.</p>
                              <label for="'.$quantite.'" class="col-form-label"> Nombre de voiture:</label>
                              <input type="number" class="form-control" id="'.$quantite.'" required/>
                              <a  id="' . $reservation . '" class="btn btn-primary btn-sm">Réservation</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>';
               }
           }
          ?>
          <!-- ./Team member -->
        </div>
        <!-- Team -->
      </div>
    </div><!-- End Portfolio Section -->