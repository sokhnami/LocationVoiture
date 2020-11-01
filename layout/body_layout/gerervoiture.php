<section id="main">
    <!-- ======= About Section ======= -->
    <div id="about" class="about-area area-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Gestion des voitures</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- single-well start-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-left">
                        <div class="single-well">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="background-color: #3EC1D5; border-color: #3EC1D5;"><i class="fas fa-plus"></i> Voiture</button>
                        </div>
                    </div>
                </div>
                <!-- single-well end-->
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="well-middle">
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="search" name="search" id="search_course" class="form-control" placeholder="rechercher une voiture..." />
                                <button type="submit" class="form-control btn btn-default" style="background-color: #3EC1D5;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End col-->
            </div>
        </div>
    </div><!-- End About Section -->

    <!-- ======= Portfolio Section ======= -->
    <div id="portfolio" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Nos collections de voitures</h2>
                    </div>
                </div>
            </div>

            <!-- Team member -->
            <?php
            $sth = $db->prepare("Select * from voiture");
            $sth->execute();
            $i = 0;
            if ($sth->rowCount()) {
                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                    $i++;
                    // var_dump($row);
                    // recupération des données lier à l'offre
                    $immatriculation = $row['Immatriculation'];
                    $type = $row['Type'];
                    $libelle = $row['Libelle'];
                    $quantite = $row['Quantite'];
                    $gerantId = $row['GerantId'];
                    $dateCreation = $row['DateCreation'];

                    // Recupération du conducteur
                   /*  $conduct = $db->prepare("Select * from conducteur where id = $ConducteurId");
                    $conduct->execute();
                    $row_conduct = $conduct->fetch(PDO::FETCH_ASSOC); */

                    // Recupération de la voiture
                    $voiture = $db->prepare("Select * from utilisateur where Id = '$gerantId'");
                    $voiture->execute();
                    $row_voiture = $voiture->fetch(PDO::FETCH_ASSOC);
                    $voiture_bis = $row_voiture['type'] . ' ' . $row_voiture['libelle'];
                    $gerant = $row_voiture['prenom'] . ' ' . $row_voiture['nom'];
                    if ($i == 1) {
                        echo '<div class="row">';
                    }
                    $editOffre = 'editOffre' . uniqid();
                    $deleteOffre = 'deleteOffre' . uniqid();
                    $editInput = 'editInput' . uniqid();
                    echo '<div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="image-flip"">
                                    <div class="mainflip">
                                        <div>
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <p><img class=" img-fluid" src="https://sunlimetech.com/portfolio/boot4menu/assets/imgs/team/img_01.png" alt="card image"></p>
                                                    <h4 class="card-title">immatriculation: ' . $immatriculation . '</h4>
                                                    <p class="card-title">libelle: ' . $libelle . '</p>
                                                    <p class="card-title">quantite: ' . $quantite . '</p>
                                                    <p class="card-title">gerant: ' . $gerant . '</p>
                                                    <p class="card-title">Voiture: ' . $voiture_bis . '</p>
                                                    <a  id="' . $editOffre . '" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                                    <input type="hidden" id="' . $editInput . '" name="' . $editInput . '" value="' . $immatriculation . '" />
                                                    <a id="' . $deleteOffre . '" href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <script src="/Covoiturage/Content/vendor/jquery/jquery.min.js"></script>
                            <script>
                            $(document).ready(function() {
                                $("#' . $deleteOffre . '").click(function() {
                                    $.confirm({
                                        title: \'Confirm!\',
                                        content: \'Êtes-vous de vouloir le supprimer!\',
                                        buttons: {
                                            confirm: function () {
                                                axios.post(\'http://localhost/LocationVoiture/Controllers/Voiture/delete.php\', {
                                                    immatriculation: ' . $immatriculation . '
                                                })
                                                .then(function(response) {
                                                    console.log(response);
                                                    $.alert(\'Supprimé avec succés!\');
                                                    window.location.reload(true);
                                                })
                                                .catch(function(error) {
                                                    console.log(error);
                                                });
                                            },
                                            cancel: function () {
                                                $.alert(\'Annulé!\');
                                            }
                                        }
                                    });
                                                            
                                    
                                })

                                $("#' . $editOffre . '").click(function() {
                                    var value= $("#' . $editInput . '").val();
                                    $(\'#exampleModalEdit\').modal(\'show\');
                                    console.log("Response select: Debut")
                                    $.ajax({
                                        type: "Get",
                                        dataType: "JSON",
                                        url: ("http://localhost/LocationVoiture/Controllers/Voiture/read_one.php?immatriculation=' . $immatriculation . '"),
                                        success: function(response) {
                                            console.log("Response select succes: ")
                                            console.log(response);
                                            $(\'#immatriculationEdit\').val(response.immatriculation);
                                            $(\'#typeEdit\').val(response.type);
                                            $(\'#libelleEdit\').val(response.libelle);
                                            $(\'#quantiteEdit\').val(response.quantite);
                                            $("#dateCreation").val(response.dateCreation);
                                        },
                                        error: function(response) {
                                            console.log("Response select error: ")
                                            console.log(response);
                                        }
                                    })
                                })
                            });
                            </script>';
                    if ($i == 3) {
                        echo '</div><br /><br />';
                        $i = 0;
                    }
                }
            }
            ?>
            <!-- ./Team member -->

            <!-- Team -->


        </div>
    </div><!-- End Portfolio Section -->
</section>

<section class="page-banner-section">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: 210px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nouvelle voiture<age</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="immatriculation" class="col-form-label">Immatriculation:</label>
                            <input type="text" class="form-control" id="immatriculation" name="immatriculation">
                        </div>
                        <div class="form-group">
                            <label for="type" class="col-form-label"> Type:</label>
                            <input type="text" class="form-control" id="type" name="type"  />
                        </div>
                        <div class="form-group">
                            <label for="libelle" class="col-form-label"> Libelle:</label>
                            <input type="text" class="form-control" id="libelle" name="libelle"  />
                        </div>
                        <div class="form-group">
                            <label for="quantite" class="col-form-label"> Quantite:</label>
                            <input type="number" class="form-control" id="quantite" name="quantite" />
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red; border-color: red;"><i class="far fa-window-close"></i></button>
                    <button type="button" id="saveData" class="btn btn-primary" style="background-color: #3EC1D5; border-color: #3EC1D5;"><i class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-banner-section">
    <div class="modal fade" id="exampleModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="margin-top: 210px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalEditLabel">Modifier offre<age</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="immatriculation" class="col-form-label">Immatriculation:</label>
                            <input type="text" class="form-control" id="immatriculationEdit" readonly name="immatriculationEdit">
                            <input type="hidden" class="form-control" id="immatriculationEdit" readonly name="immatriculationEdit">
                        </div>
                        <div class="form-group">
                            <label for="typeEdit" class="col-form-label"> Type:</label>
                            <input type="text" class="form-control" id="typeEdit" name="typeEdit"  />
                        </div>
                        <div class="form-group">
                            <label for="libelleEdit" class="col-form-label"> Libelle:</label>
                            <input type="text" class="form-control" id="libelleEdit" name="libelleEdit"  />
                        </div>
                        <div class="form-group">
                            <label for="quantiteEdit" class="col-form-label"> Quantite:</label>
                            <input type="number" class="form-control" id="quantiteEdit" name="quantiteEdit"  />
                        </div>
                        <div class="form-group id_100">
                            <label for="VoitureEdit" class="col-form-label">Voiture:</label>
                            <?php
                            $sth = $db->prepare("Select * from voiture");
                            $sth->execute();

                            if ($sth->rowCount()) {
                                echo "<select class=\"form-control\" id='VoitureEdit'  name='VoitureEdit'>";
                                echo "<option value='0'>Sélectionner</option>";
                                while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<option value='" . $row['imm'] . "'>" . $row['type'] . "</option>";
                                }
                                echo "</select>";
                            }
                            ?>
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: red; border-color: red;"><i class="far fa-window-close"></i></button>
                    <button type="button" id="saveDataEdit" class="btn btn-primary" style="background-color: #3EC1D5; border-color: #3EC1D5;"><i class="fas fa-save"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>