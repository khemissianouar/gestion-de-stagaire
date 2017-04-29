<?php session_start(); 
 require("core.php");
$auth = new Usersmanager();
$spe= new specialitemanager();



if(isset($_SESSION)){
  $auth->auth($_SESSION['email'],$_SESSION['cin']);
}
  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $auth->deco();
  }
      if(isset($_GET['cin']) && !empty($_GET['cin'])){
  $etudiant=$auth->afficheunetudiant($_GET['cin']);
  }
if(isset($_POST['enregistrer']))
{ $diplome =htmlspecialchars($_POST['groupe']);
  $specialite=htmlspecialchars($_POST['specialite']);

  $tel=htmlspecialchars($_POST['tel']);
  $adresse =htmlspecialchars($_POST['adresse']);
  $ville=htmlspecialchars($_POST['ville']);
  $datedenaissance =htmlspecialchars($_POST['datedenaissance']);
  $nom=htmlspecialchars($_POST['nom']);
  $prenom =htmlspecialchars($_POST['prenom']);
  $cin =htmlspecialchars($_POST['cin']);
  $email=htmlspecialchars($_POST['email']);


   if(!empty($_POST['nom'])){
     if(!empty($_POST['prenom'])){
       if(!empty($_POST['datedenaissance'])){
         if(!empty($_POST['groupe'])){
           if(!empty($_POST['niveau'])){
             if(!empty($_POST['specialite'])){
               if(!empty($_POST['ville'])){
                if(!empty($_POST['tel'])){
                    if(is_numeric($tel)){
                      if(!empty($_POST['email'])){
                    
  

                  
                 
  $cinlength = strlen($cin);
   if(filter_var($email,FILTER_VALIDATE_EMAIL)){
    if(!empty($_POST['adresse'])){
      if(!empty($_POST['cin'])){
   
  
  if(is_numeric($cin))
  {

         if( $cinlength == 8){

$auth->modefieetudiant($_POST);}

            
  else {
    $erreur11="cin est incorrecte"; }
  }


          else {
         $erreur11='cin doit etre numerique';
              } 
                
}
              else {
        $erreur11='vous devez saisir le cin';
     }
    
}
  else {
        $erreur10='vous devez saisir l adresse';
     }
   

}


          else { $erreur9='votre email est incorrecte';

               }
}

  else {
        $erreur9='vous devez saisir le email';
     }
   

}
else {
        $erreur8='le numero de tel doit etre numerique';
     }
   
}
  else {
        $erreur8='vous devez saisir le tel';
     }
   

}



  else {
        $erreur7='vous devez saisir le ville';
     }
   

}

  else {
        $erreur6='vous devez saisir le specialite';
     }
   

}

  else {
        $erreur5='vous devez saisir le niveau';
     }
   

}

  else {
        $erreur4='vous devez saisir le groupe';
     }
   

}

  else {
        $erreur3='vous devez saisir le date de naissance';
     }
   

}

  else {
        $erreur2='vous devez saisir le prenom';
     }
   

}




  else {
        $erreur1='vous devez saisir le nom';
     }
   


}

?>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="..\css\style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css" />
<style>
.right {
    position: absolute;
    right: 0px;
    width: 300px;
    
    padding: 10px;
}
</style>
<body>
<div id="container">
<img id="i" src="../image/f.jpg">
<img id="f" src="../image/l.png" >
<div class="right" ><a href="?m=deco">deconnexion</a></div>

<form method="POST"  class="form_connexion">
<table align="center">
<input type="hidden" name='id' value="<?php echo $etudiant['id'];?>"/>
<tr><td><label> Nom * </label>
<td><input type="text" name="nom" class="input_connexion" value="<?php echo $etudiant['nom'];?>" ><td>
<?php
if(isset($erreur1)){
  echo '<font color="red">' .$erreur1."</font>" ;

}
?></td>
</tr><tr> <td><label> Prénom   </label></td>
<td><input type="text" name="prenom" class="input_connexion" value="<?php echo $etudiant['prenom'];?>" ><td>
<?php
if(isset($erreur2)){
  echo '<font color="red">' .$erreur2."</font>" ;

}
?></td>
</tr><tr><td><label> Date De Naissance*</label></td>
<td><input type="date" name="datedenaissance" class="input_connexion" value="<?php echo $etudiant['datedenaissance'];?>" ></td>
<td>
<?php
if(isset($erreur3)){
  echo '<font color="red">' .$erreur3."</font>" ;

}
?></td>
</tr><tr><td><label> Groupe*     </label></td>
<td><FORM>
<SELECT name="groupe" size="1" class="input_connexion" >
<OPTION><?php echo $etudiant['groupe'];?></OPTION> 
<OPTION>1
<OPTION>2
<OPTION>3
<OPTION>4
<OPTION>5
</SELECT>
</FORM></td>
<td>
<?php
if(isset($erreur4)){
  echo '<font color="red">' .$erreur4."</font>" ;

}
?></td>
</tr><tr><td><label> Niveau*</label></td>
<td>
<SELECT name="niveau" size="1" class="input_connexion" >
<OPTION><?php echo $etudiant['niveau'];?></OPTION> 
<OPTION>1
<OPTION>2
<OPTION>3
<OPTION>4
<OPTION>5
</SELECT>
</td>
<td>
<?php
if(isset($erreur5)){
  echo '<font color="red">' .$erreur5."</font>" ;

}
?></td>
</tr><tr><td><label> Specialite*   </label></td>
<td><input type="text" name="specialite" class="input_connexion" value="<?php $unspe=$spe->afficheunspecilaite($etudiant['idspecialite']);   echo $unspe['specialite'];?>"
   ></td>
<td>
<?php
if(isset($erreur6)){
  echo '<font color="red">' .$erreur6."</font>" ;

}
?></td>
</tr><tr><td><label> Ville   </label></td>
<td><input type="text" name="ville" class="input_connexion" value="<?php echo $etudiant['ville'];?>" ></td>
<td>
<?php
if(isset($erreur7)){
  echo '<font color="red">' .$erreur7."</font>" ;

}
?></td>
</tr><tr><td><label> tel*</label></td>
<td><input type="text" name="tel" class="input_connexion" value="<?php echo $etudiant['tel'];?>" ></td>
<td>
<?php
if(isset($erreur8)){
  echo '<font color="red">' .$erreur8."</font>" ;

}
?></td>
</tr><tr><td><label> Email*    </label></td> 
</td>
<td><input type="text" name="email" class="input_connexion" value="<?php echo $etudiant['email'];?>" ></td>
<td>
<?php
if(isset($erreur9)){
  echo '<font color="red">' .$erreur9."</font>" ;

}?></td>
</tr><tr><td><label> Adresse     </label></td>
<td><input type="text" name="adresse" class="input_connexion" value="<?php echo $etudiant['adresse'];?>" ></td>
</tr><tr><td><label>  Cin * </label></td>
<td><input type="text" name="cin" class="input_connexion" value="<?php echo $etudiant['cin'];?>" ></td>
<td>
<?php
if(isset($erreur11)){
  echo '<font color="red">' .$erreur11."</font>" ;

}?></td></tr>
<tr><td></td><td><input type="submit" name="enregistrer" value="Enregistrer" id="btn" ></td>
<tr><td>  </td> <td> </td></tr>

<tr>
<td>
<?php
if(isset($erreur)){
  echo '<font color="red">' .$erreur."</font>" ;

}
?></td>
</tr>

</table>

</form>
  <a href="listedeetudiant.php"><img src="../image/retour.png" width="40px" height="40px"> </a>
</div>
</body>
</html>
