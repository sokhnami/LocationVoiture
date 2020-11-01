 <!-- Hiello je suis l'entete de la page c'est moi la belle voiture qui contient les options -->
        <div id="entete"> <!--debut entete-->
            <img class="image_entete" src="image/fondindex.JPG" /> 
            <div id="trucs">
                <p class="nomsite"> Kangam Automobile</p> 
              
                <a href="indexAccueil.php?op=1"><b id="lesoptions" class="options">Offres</b></a> 
                <a href="indexAccueil.php?op=2"><b class="options">Espace Clients</b></a>
                <a href="compte/connexion.php"><b class="options">S'incrire/Se connecter</b></a>
                <a href="indexAccueil.php?op=5"><b class="options">FAQ</b></a>
                                           
            </div>          
            <div id="formrecherche">
                <form name="formrecherche" method="post" action="">
                    <input id="motcle" type="text" name="motcle" placeholder="Recherche par Marque...." />
                    <input class="btnsubmit" type="submit" name="btnsumit" value="Recherche" />
                    
                </form>
                
            </div>
        </div> <!--fin Entete-->