<?php 
require("core.php");
session_start();
$auth=new usersmanager();
$dep= new departementmanager();
if(isset($_SESSION)){
  $auth->auth($_SESSION['email'],$_SESSION['cin']);
}


  if(isset($_GET['m']) && $_GET['m']=='deco'){
  $auth->deco();
  }

    if(isset($_GET['cin']) && !empty($_GET['cin'])){
  $enseignant=$auth->afficheunenseignant($_GET['cin']);
  $auth->modefieenseignant($_POST);
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
<input type="hidden" name='id' value="<?php echo $enseignant['id'];?>"/>

<tr><td><label> Nom * </label>
<td><input type="text" name="nom" class="input_connexion" value="<?php echo $enseignant['nom'];?>"/></td>
<?php
if(isset($erreur1)){
	echo '<font color="red">' .$erreur1."</font>" ;

}
?></td>
</tr><tr> <td><label> Prénom * </label></td>
<td><input type="text" name="prenom" class="input_connexion" value="<?php echo $enseignant['prenom'];?>"/><td>
<?php
if(isset($erreur2)){
	echo '<font color="red">' .$erreur2."</font>" ;

}
?>
</td>
</tr><tr><td><label> Grade *</label></td>
<td>
<SELECT name="grade" size="1" class="input_connexion">
<OPTION ><?php echo $enseignant['grade'];?></OPTION>
<OPTION>maitre de conference</OPTION>
<OPTION>maitre assistant</OPTION>
<OPTION>maitre technologue</OPTION>
<OPTION>technologue</OPTION>
<OPTION>professeur</OPTION>
<OPTION>assistant</OPTION>
<OPTION>pes</OPTION>
</SELECT>
</td>
<td>
<?php
if(isset($erreur3)){
	echo '<font color="red">' .$erreur3."</font>" ;

}
?></td>
</tr><tr><td><label> Departement *</label></td>
<td><input type="text" name="adresse" class="input_connexion" value="<?php $undep=$dep->afficheundepartement($enseignant['iddepartement']);   echo $undep['nomdep'];?>"/></td>
<td>
<?php
if(isset($erreur6)){
  echo '<font color="red">' .$erreur6."</font>" ;

}
?></td>

</tr>

<tr><td><label> Email *    </label></td> 
</td>
<td><input type="text" name="email" class="input_connexion" value="<?php echo $enseignant['email'];?>"/></td>
<td>
<?php
if(isset($erreur4)){
	echo '<font color="red">' .$erreur4."</font>" ;

}?></td></tr>
</tr><tr><td><label> Cin *   </label></td>
<td><input type="text" name="cin" class="input_connexion" value="<?php echo $enseignant['cin'];?>"/></td>
<td>
<?php
if(isset($erreur5)){
	echo '<font color="red">' .$erreur5."</font>" ;

}
?></td>
</tr><tr><td><label> Adresse *</label></td>
<td><input type="text" name="adresse" class="input_connexion"value="<?php echo $enseignant['adresse'];?>"/></td>
<td>
<?php
if(isset($erreur6)){
	echo '<font color="red">' .$erreur6."</font>" ;

}
?></td>

</tr><tr><td><label> Tel *</label></td>
<td><input type="text" name="tel" class="input_connexion" value="<?php echo $enseignant['tel'];?>"/></td>
<td>
<?php
if(isset($erreur6)){
	echo '<font color="red">' .$erreur7."</font>" ;

}

?></td></tr>	

<tr><td><input type="submit" name="enregistrer" value="Enregistrer" id="btn"/></td>

</tr>
            	
</table>
<tr><td></td><td>
<?php
if(isset($erreur)){
	echo '<font color="red">' .$erreur."</font>" ;

}?></td></tr>
</form>

  <a href="listedeenseignant.php"><img src="../image/retour.png" width="40px" height="40px"></a>
</div>
</body>
</html>