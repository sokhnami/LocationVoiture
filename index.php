<?php
    session_start();
    require_once("connexion/dbconnexion.php"); 
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<?php include("layout/head_layout/header.php"); ?>
</style>
    <body >
        <?php
        include("layout/body_layout/entete.php");
        include("layout/body_layout/apropos.php");
        ?>
        <div id="blancmilieu"><!--debut milieu-->
            <?php 
                if (isset($_GET['op'])) {
                    $l=$_GET['op'];
                    if ($l==1) {
                        # je méne vers la page d'offre
                        include("layout/body_layout/gererreservation.php");
                    echo "page offre";}
                    elseif ($l==2) {
                           # je méne vers espaces client
                        echo "page espace client";
                       }   
                    elseif ($l==3) {
                        # je méne vers la page inscription
                        echo "page inscription";
                        // include("layout/body_layout/inscription.php");
                    }
                    elseif ($l==4) {
                        # je méne vers la page se connecter
                        echo "page connexion";}
                        elseif ($l==5) {
                            # je méne vers la faq 
                            echo "page faq";
                        }
                        else{
                            #offre page par defaut
                            echo "page par defaut";
                        }

                }
                 if (isset($_GET['of'])) {
                    $f=$_GET['of'];
                    if ($f==1) {
                        //qui sommes nous du footer
                        include("layout/footer_layout/quiSommesNous.php");
                    }
                    elseif ($f==2) {
                        //contact du foooter
                        include("layout/footer_layout/contact.php");
                        
                    }
                    elseif ($f==3) {
                        // conditions generales d'utilisation du footer
                        include("layout/footer_layout/conditionGeneral.php");
                       
                    }
                    elseif ($f==4) {
                        //politique de confidentialité du footer
                        include("layout/footer_layout/politiqueConf.php");
                        
                    }
                    elseif ($f==5) {
                        // informations legales du footer
                        include("layout/footer_layout/infoLegale.php");
                       
                    }
                    elseif ($f==6) {
                        // faq sur le corona virus du footer
                        include("layout/footer_layout/faqCovid.php");
                    }
                    elseif ($f==7) {
                        // utilisation des cookies du footer
                        include("layout/footer_layout/cookies.php");
                    }
                    
                # code...
                 }
             ?>
            
        </div><!--fin milieu-->
         <script type="text/javascript" src="./page.js"></script>
    </body>
    <footer>
        <div>
            <div id="fa">
                <a href="indexAccueil.php?of=1"><p class="of">Qui sommes-nous ?</p></a>  
                <a href="indexAccueil.php?of=2"><p class="of">Contact</p></a>
          
            </div>
            <div id="fb">
                <a href="indexAccueil.php?of=3"><p class="of">Conditions Générales d'Utilisations</p></a>
                <a href="indexAccueil.php?of=4"><p class="of">Politique de Confidentialité</p></a>
                <a href="indexAccueil.php?of=5"><p class="of">Informations Légales</p></a>
            </div>
            <div id="fc">
                <a href="indexAccueil.php?of=6"><p class="of">FAQ sur le coronavirus (COVID-19)</p></a>
                <a href="indexAccueil.php?of=7"><p class="of">Utiisations des Cookies</p></a>     
            </div>   
        </div>
        <p id="ka"><b>@Kangam_Automobile</b></p>


    </footer>
</html>