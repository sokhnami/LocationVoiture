<?php
    session_start();
    require_once("connexion/dbconnexion.php"); 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php include("layout/head_layout/header.php"); ?>
    <body >
        <?php
        include("layout/body_layout/entete.php");
         
        if(isset($_GET['op'])) {
            $opt=$_GET['op'];
            if($opt==1){
            	// include("layout/body_layout/entete.php");
         		include("layout/body_layout/gerervoiture.php");
         	}
         	elseif($opt==2)
         		include("layout/body_layout/gererreservation.php");
         }
        else
        	include("layout/body_layout/gerervoiture.php");

            
                 
                
             ?>

            

    </body>
   
</html>
<!-- Vendor JS Files -->
<script src="/Covoiturage/Content/vendor/jquery/jquery.min.js"></script>
<script src="/Covoiturage/Content/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/Covoiturage/Content/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/Covoiturage/Content/vendor/php-email-form/validate.js"></script>
<script src="/Covoiturage/Content/vendor/appear/jquery.appear.js"></script>
<script src="/Covoiturage/Content/vendor/knob/jquery.knob.js"></script>
<script src="/Covoiturage/Content/vendor/parallax/parallax.js"></script>
<script src="/Covoiturage/Content/vendor/wow/wow.min.js"></script>
<script src="/Covoiturage/Content/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="/Covoiturage/Content/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
<script src="/Covoiturage/Content/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="/Covoiturage/Content/vendor/venobox/venobox.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- Template Main JS File -->
<script src="../Scripts/js/main.js"></script>
<script>
    $(document).ready(function() {
        $("#addOffre").click(function() {
            alert('button clicked');
        });

        // var res = $('#NomTrajet').val()
        /**
         * !empty($data->immatriculation) &&
            !empty($data->type) &&
            !empty($data->libelle) &&
            !empty($data->quantite) &&
            !empty($data->gerantId) &&
            !empty($data->dateCreation)
         */

        $("#saveData").click(function() {
            console.log("Recu");
            axios.post('http://localhost/Location/Controlers/Voiture/create.php', {
                    immatriculation: $('#immatriculation').val(),
                    type: $('#type').val(),
                    libelle: $('#libelle').val(),
                    quantite: $('#quantite').val(),
                    gerantId: '1'
                })
                .then(function(response) {
                    console.log(response);
                    $('#exampleModal').modal('hide');
                    window.location.reload(true);
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        $("#saveDataEdit").click(function() {
            axios.post('http://localhost/Location/Controlers/Voiture/update.php ', {
                    immatriculation: $('#immatriculationEdit').val(),
                    type: $('#typeEdit').val(),
                    libelle: $('#libelleEdit').val(),
                    quantite: $('#quantiteEdit').val(),
                    gerantId: '1'
                })
                .then(function(response) {
                    console.log(response);
                    $('#exampleModal').modal('hide');
                    window.location.reload(true);
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        $("#Voiture").on('change', function() {
            console.log("Response select: Changé")
            $.ajax({
                type: "Get",
                dataType: "JSON",
                url: 'http://localhost/Covoiturage/api/offre/getVoitureById.php?imm=' + this.value,
                success: function(response) {
                    console.log("Response select succes: ")
                    console.log(response);
                    $('#NombrePlace').val(response.nbrPlace);
                    $('#conducteurId').val(response.conducteurkey);
                },
                error: function(response) {
                    console.log("Response select error: ")
                    console.log(response);
                }
            })
        })

        $("#VoitureEdit").on('change', function() {
            console.log("Response select: Debut")
            $.ajax({
                type: "Get",
                dataType: "JSON",
                url: 'http://localhost/Covoiturage/api/offre/getVoitureById.php?imm=' + this.value,
                success: function(response) {
                    console.log("Response select succes: ")
                    console.log(response);
                    $('#NombrePlaceEdit').val(response.nbrPlace);
                    $('#conducteurIdEdit').val(response.conducteurkey);
                },
                error: function(response) {
                    console.log("Response select error: ")
                    console.log(response);
                }
            })
        })


    });
</script>