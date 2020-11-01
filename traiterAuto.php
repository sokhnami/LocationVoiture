<?php
  session_start();
  require("mabase/dbconnexion.php");
  require("mesfonctions/imageCheck.php");

if(isset($_POST['imm']) && isset($_POST['type']) && isset($_POST['nbre']) && isset($_POST['lib']))
{
    $v;
    $imm=$_POST['imm'];
    $type=$_POST['type'];
    $nbre=$_POST['nbre'];
    $lib=$_POST['lib'];
    $imm=addslashes($imm);
    $type=addslashes($type);
    $nbre=addslashes($nbre);
    $lib=addslashes($lib);

    $conducteur=$_SESSION['id'];
    $req="insert into voiture values('$imm','$type',$nbre,'$lib',$conducteur) "; 
    $db->beginTransaction();
    $res=$db->exec($req);
    if($res){$v=1;}
    $db->commit();    
   
    if(isset($_FILES['ims']))
    {
      $nfs=count($_FILES['ims']['name']);
      $files=$_FILES['ims'];
      for($i=0;$i<$nfs;$i++)
      {
        if($files['error'][$i]==0)
        {
          echo("<br/><br/>Image n° ".($i+1)." :<br/>");
          echo "<br/>UPLOAD réussi<br/>";
          echo "<br/>Nom du fichier origine : ".$files['name'][$i]."<br/>";
          echo "<br/>Taille du fichier : ".$files['size'][$i]."<br/>";
          $file_name=$files['name'][$i];
          $ext_bonne=array('png','jpeg','jpg');
          if(valid_extension($file_name,$ext_bonne))
          {
            echo "<br/>Extension est bien valide<br/>";
            if(valid_size($file=null,$filesize=$files['size'][$i]))
            {
              echo "<br/>La taille est bien valide<br/>";
              if($imc=move_file($files['tmp_name'][$i],"NouvelleDestination",$file_name))
                {

                  $imc=addslashes($imc);
                  $reqIms="insert into image values(NULL,'$imc','$imm')"; 
                  
                  $db->beginTransaction();

                  // on va utiliser une session de l id du conducteur $immauto=$db->lastInsertId();

                  $resim=$db->exec($reqIms);

                  $db->commit();
                  // $db->rollback();
                  if($v==1){
                      if($resim){
                      // succes 
                      //echo "<br/>ajout avec succès avec comme id : <br/>";
                      //echo("<br/>Image n° ".($i+1)." sauvegardée avec succès :<br/>");
                      header("Location:indexConducteur.php");
                      }
                      else{
                      // echo"image non insere";
                      header("Location:espaceAuto.php?error=0");
                      } 
                  }
                  else{
                    // echo "<br/>echec de l'ajout<br/>";
                    header("Location:espaceAuto.php?error=1");

                  }
                    
                }
              }

              else{
                // echo "problème lors du déplacement"; 
                header("Location:espaceAuto.php?error=2"); 
              }

            }
            else{
              // echo "<br/>La taille pas valide <br/>";
              header("Location:espaceAuto.php?error=3");
            }

          }
          else{
            // echo "<br/>Extension pas valide<br/>";
            header("Location:espaceAuto.php?error=4");
          }

      }
    }
}
?>